<?php

namespace App\Http\Controllers;

use App\Models\Facilities;
use App\Models\Types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class FacilitiesController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth:web');
        $this->middleware('facilities-list',['only'=> ['index','show']]);
        $this->middleware('facilities-create',['only'=> ['create','store']]);
        $this->middleware('facilities-edit',['only'=> ['edit','update']]);
        $this->middleware('facilities-delete',['only'=> ['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Facilities::orderBy('id', 'desc')->paginate(20);
        return view('admin.all-facilities')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Types::all();
        return view('admin.create_facility', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:facilities'
        ];
        $this->validate($request, $rules);
        if (Facilities::where('name', $request->name)->exists()) {
            // exists
            Session::flash('message', "$request->type Already Exists");
            return Redirect::back();
        } else {
            $type = new Facilities;
            $type->name = $request->name;
            $type->description = $request->description;
            $type->type_id = $request->type;
            $type->save();
            return redirect(url('panel/admin/all/facilities'));

        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Facilities $facilities
     * @return \Illuminate\Http\Response
     */
    public function show(Facilities $facilities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Facilities $facilities
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Types::all();
        $data = Facilities::where('id', $id)->first();
        return view('admin.edit-facility', compact('data', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Facilities $facilities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|unique:facilities,name,' . $request->id,
        ];
        $this->validate($request, $rules);


        $type = Facilities::findOrFail($id);
        $type->name = $request->name;
        $type->description = $request->description;
        $type->type_id = $request->type;
        $type->save();
        return redirect(url('panel/admin/all/facilities'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Facilities $facilities
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Facilities::where('id', $id)->first();
        $delete->delete();
        return redirect(url('panel/admin/all/facilities'));
    }
}
