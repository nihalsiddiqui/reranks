<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use org\bovigo\vfs\vfsStreamContainerIterator;
use App\Models\Group;
class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        return 'rgtret';
    }

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
