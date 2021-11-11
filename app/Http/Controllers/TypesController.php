<?php

namespace App\Http\Controllers;

use App\Models\Types;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;
use Session;

class TypesController extends Controller
{
    public function __Contruct()
    {
        $this->middleware('auth:web');
        $this->middleware('permission:types-list',['only'=> ['index','show']]);
        $this->middleware('permission:types-create',['only'=> ['create','store']]);
        $this->middleware('permission:types-edit',['only'=> ['edit','update']]);
        $this->middleware('permission:types-delete',['only'=> ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Types::orderBy('id','desc')->paginate(20);
        return view('admin.all-types')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-types');
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
            'type' => 'required|unique:types'
        ];
        $this->validate($request, $rules);

        if (Types::where('type', $request->type)->exists()) {
            // exists
            Session::flash('message', "$request->type Already Exists");
            return Redirect::back();
        }
        else{
            $type = new Types;
            $type->type = $request->type;
            $type->description = $request->description;
            $type->save();
            return redirect(url('panel/admin/all/types'));

        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Types::where('id',$id)->first();
        return view('admin.edit-type',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = [
            'type' => 'required|unique:types,type,'.$request->id,
        ];
        $this->validate($request,$validation);
        $type = Types::findOrFail($id);
        $type->type = $request->type;
        $type->description = $request->description;
        $type->save();
        return redirect(url('panel/admin/all/types'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Types::where('id',$id)->first();
        $delete->delete();
        return redirect(url('panel/admin/all/types'));
    }
}
