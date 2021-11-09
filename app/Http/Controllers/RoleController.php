<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web');
        $this->middleware('permission:role-list', ['only' => ['index', 'show', 'allShow']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->input('q');

        if ($query != '' && strlen( $query ) > 2) {
            $data = Role::where('name', 'LIKE', '%'.$query.'%')->orderBy('id','desc')->paginate(20);
        } else {
            $data = Role::orderBy('id','desc')->paginate(20);
        }
        return view('admin.all-role', ['data' => $data, 'query' => $query]);
//        $data = Role::orderBy('id','desc')->paginate(20);
//        return view('admin.all-role', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('admin.add-role',compact('permissions'));
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
            'name' => ['required', 'unique:roles,name'],
            'permission' => ['required', 'array']
        ]);
        $role = Role::create([
            'name' => $request->name,
        ]);
        $role->syncPermissions($request->permission);

        return redirect()->back()->withSuccess($role->name . ' successfully created.');
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
        $data = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('admin.edit-role',compact('data','permissions'));
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
        $request->validate([
            'name' => ['required', 'unique:roles,name,' . $id],
            'permission' => ['required', 'array']
        ]);
        $role = Role::findOrFail($id);
        if($role->name === 'Admin') {
            return redirect()->back()->with('error', $role->name . ' role cannot be update.');
        }

        $role->name = $request->name;
        $role->save();
        $role->syncPermissions($request->permission);

        return redirect()->back()->withSuccess($role->name . ' successfully created.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Role::findOrFail($id);
        if ($data->name == 'Admin'){
            return redirect()->back();
        }else{
            $data->delete();
            return redirect()->back()->withSucess('Role Deleted Successfully');
        }


    }
}
