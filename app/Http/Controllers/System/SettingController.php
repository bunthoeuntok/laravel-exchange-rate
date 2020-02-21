<?php

namespace App\Http\Controllers\System;

use App\System\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use System;
use File;
use Image;

class SettingController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('system.settings.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Setting\System  $system
	 * @return \Illuminate\Http\Response
	 */
	public function show(System $system)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Setting\System  $system
	 * @return \Illuminate\Http\Response
	 */
	public function edit(System $system)
	{
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Setting\System  $system
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, System $system)
	{
		$path = public_path('upload/images/system/');
		if(!File::isDirectory($path)) {
	        File::makeDirectory($path, 0777, true, true);
	    }

	    $image = Image::make(request()->file('logo'))->resize(120, 120)->save($path.'logo.png');
	    $image = Image::make(request()->file('icon'))->resize(20, 20)->save($path.'icon.png');
	    dd($image);
   	
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Setting\System  $system
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(System $system)
	{
		//
	}
}
