<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Models\User;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller {


    public function __construct()
    {
        $this->middleware('auth:web');
        $this->middleware('permission:posts-list',['only'=>['index','show']]);
        $this->middleware('permission:posts-create',['only'=>['create','store']]);
        $this->middleware('permission:posts-edit',['only'=>['edit','update']]);
        $this->middleware('permission:posts-delete',['only'=>['destroy']]);
    }

    protected function validator(array $data, $id = null)
	 {
	    Validator::extend('ascii_only', function($attribute, $value, $parameters) {
	    		return !preg_match('/[^x00-x7F\-]/i', $value);
			});

			// Create Rules
			if($id == null) {
				return Validator::make($data, [
	      'title'      =>      'required',
				'slug'       =>      'required|ascii_only|alpha_dash|unique:pages',
				'content'    =>      'required',
	        ]);

			// Update Rules
			} else {
				return Validator::make($data, [
		      'title'      =>      'required',
					'slug'       =>      'required|ascii_only|alpha_dash|unique:pages,slug,'.$id,
					'content'    =>      'required',
		        ]);
			}
    }

	 /**
   * Display a listing of the resource.
   *
   * @return Response
   */
	 public function index()
	 {
	 	$data = Pages::all();
		return view('admin.pages')->withData($data);
	 }

	 /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
	 public function create()
	 {
    	return view('admin.add-page');
	 }

	 /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
	 public function store( Request $request )
	 {
		 $input = $request->all();
		 $validator = $this->validator($input);

	    if ($validator->fails()) {
				return redirect()->back()
										->withErrors($validator)
										->withInput();
	    }

		Pages::create($input);

		\Session::flash('success_message',trans('admin.success_add'));

		return redirect('panel/admin/pages');

	}//<--- End Method

	/**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
	public function show($page)
	{
		$response = Pages::where('slug','=', $page)->firstOrFail();
		return view('pages.show')->withResponse($response);
	}//<--- End Method

	/**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
	public function edit($id)
	{
		$data = Pages::findOrFail($id);
		return view('admin.edit-page')->withData($data);
	}//<--- End Method

	/**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
	public function update($id, Request $request)
	{
    $page = Pages::findOrFail($id);
		$input = $request->all();

		$validator = $this->validator($input,$id);

	    if ($validator->fails()) {
				return redirect()->back()
										->withErrors($validator)
										->withInput();
	    }

    $page->fill($input)->save();

    \Session::flash('success_message', trans('admin.success_update'));

    return redirect('panel/admin/pages');

	}//<--- End Method


	/**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
	public function destroy($id)
	{
		$page = Pages::findOrFail($id);
		 $page->delete();

		 return redirect('panel/admin/pages');
	}//<--- End Method


}
