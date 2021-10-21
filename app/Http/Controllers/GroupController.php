<?php

namespace App\Http\Controllers;

use App\Models\AdminSettings;
use App\Models\PaymentGateways;
use App\Models\Transactions;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use org\bovigo\vfs\vfsStreamContainerIterator;
use App\Models\Group;
use function React\Promise\all;

class GroupController extends Controller
{
    public function __construct(Request $request, AdminSettings $settings) {
        $this->request = $request;
        $this->settings = $settings::first();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::latest()->paginate(12);
//        dd($groups->all());
        return view('index.allGroups',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = User::all();
        return view('index.create-group',compact('members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $this->validate($request,[
            'name' => 'Required',
            'members' => 'Required',
        ]);
        $group = new Group;
        $group->name = $request->name;
        $group->description = $request->desc;
        $group->admin_id = auth()->id();
        $group->created_by = auth()->id();

        if ($request->hasFile('image')) {
            $temp = $request->file('image');
            $image = $request->image->getClientOriginalName();
            $destination = 'images/profile/';
            $temp->move($destination, $image);
            $group->image = $destination . $image;
        }

        if ($request->hasFile('cover_image')) {
            $temp = $request->file('cover_image');
            $image = $request->cover_image->getClientOriginalName();
            $destination = 'images/cover/';
            $temp->move($destination, $image);
            $group->cover_image = $destination . $image;
        }
        $group->save();
        $group->members()->sync($request->members);

        return redirect(route('group.user'));
    }

    public function groupProfile($id)
    {
        $slug = auth()->user()->username;
//        dd($slug);
        $media = null;
        $media = request('media');
        $mediaTitle = null;
        $sortPostByTypeMedia = null;
        if (isset($media)) {
            $mediaTitle = trans('general.'.$media.'').' - ';
            $sortPostByTypeMedia = '&media='.$media;
            $media = '/'.$media;
        }

        // All Payments
        $allPayment = PaymentGateways::where('enabled', '1')->whereSubscription('yes')->get();

        // Stripe Key
        $_stripe = PaymentGateways::whereName('Stripe')->where('enabled', '1')->select('key')->first();


        $user    = User::where('username','=', $slug)->where('status','active')->firstOrFail();

        // Hidden Profile Admin
        if (auth()->check()  == 'on' && $user->id == 1 && auth()->user()->id != 1) {
            abort(404);
        } elseif (auth()->guest()  == 'on' && $user->id == 1) {
            abort(404);
        }

        if (isset($media)) {
            $query = $user->updates();
        } else {
            $query = $user->updates()->whereFixedPost('0');
        }

        //=== Photos
        $query->when(request('media') == 'photos', function($q) {
            $q->where('image', '<>', '');
        });

        //=== Videos
        $query->when(request('media') == 'videos', function($q) use($user) {
            $q->where('video', '<>', '')->orWhere('video_embed', '<>', '')->whereUserId($user->id);
        });

        //=== Audio
        $query->when(request('media') == 'audio', function($q) {
            $q->where('music', '<>', '');
        });

        //=== Files
        $query->when(request('media') == 'files', function($q) {
            $q->where('file', '<>', '');
        });

        $updates = $query->orderBy('id','desc')->paginate($this->settings->number_posts_show);

        // Check if subscription exists
        if (auth()->check()) {
            $checkSubscription = auth()->user()->checkSubscription($user);

            if ($checkSubscription) {
                // Get Payment gateway the subscription
                $paymentGatewaySubscription = Transactions::whereSubscriptionsId($checkSubscription->id)->first();
            }


            // Check Payment Incomplete
            $paymentIncomplete = auth()->user()
                ->userSubscriptions()
                ->where('stripe_plan', $user->plan)
                ->whereStripeStatus('incomplete')
                ->first();
        }

        if ($user->status == 'suspended') {
            abort(404);
        }

        //<<<-- * Redirect the user real name * -->>>
//        $uri = request()->path();
//        $uriCanonical = $user->username.$media;
//
//
//        if ($uri != $uriCanonical) {
//
//            return redirect(route('group.profile'));
//        }

        // Find post pinned
        $findPostPinned = $user->updates()->whereFixedPost('1')->paginate($this->settings->number_posts_show);

        // Count all likes
        $likeCount = $user->likesCount();

//        group
        $group = Group::where('id',$id)->first();

//        dd($group->cover_image);
        // Subscription sActive
        $subscriptionsActive = $user->mySubscriptions()
            ->where('stripe_id', '=', '')
            ->whereDate('ends_at', '>=', Carbon::today())
            ->orWhere('stripe_status', 'active')
            ->where('stripe_id', '<>', '')
            ->whereStripePlan($user->plan)
            ->orWhere('stripe_id', '=', '')
            ->where('stripe_plan', $user->plan)
            ->where('free', '=', 'yes')
            ->count();

        return view('index.profile',[
            'user' => $user,
            'group' => $group,
            'updates' => $updates,
            'findPostPinned' => $findPostPinned,
            '_stripe' => $_stripe,
            'checkSubscription' => $checkSubscription ?? null,
            'media' => $media,
            'mediaTitle' => $mediaTitle,
            'sortPostByTypeMedia' => $sortPostByTypeMedia,
            'allPayment' => $allPayment,
            'paymentIncomplete' => $paymentIncomplete ?? null,
            'likeCount' => $likeCount,
            'paymentGatewaySubscription' => $paymentGatewaySubscription->payment_gateway ?? null,
            'subscriptionsActive' => $subscriptionsActive
        ]);

    }//<--- End Method

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        dd($id);
        $members = User::all();
        $editGroup = Group::where('id',$id)->first();
//        dd($editGroup);
        return view('index.editGroup',compact('editGroup','members'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
//        dd($request-?all());
        $this->validate($request,[
            'name' => 'Required',
            'members' => 'Required',
        ]);
        $group =  Group::findOrFail($id);
        $group->name = $request->name;
        $group->description = $request->desc;
        $group->admin_id = auth()->id();
        $group->created_by = auth()->id();

        if ($request->hasFile('image')) {
            $temp = $request->file('image');
            $image = $request->image->getClientOriginalName();
            $destination = 'images/profile/';
            $temp->move($destination, $image);
            $group->image = $destination . $image;
        }

        if ($request->hasFile('cover_image')) {
            $temp = $request->file('cover_image');
            $image = $request->cover_image->getClientOriginalName();
            $destination = 'images/cover/';
            $temp->move($destination, $image);
            $group->cover_image = $destination . $image;
        }
        $group->update();
        $group->members()->sync($request->members);
        return redirect(route('group.user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Group::where('id',$id)->first();
        $delete->delete();
        return redirect(route('group.user'));

    }
}
