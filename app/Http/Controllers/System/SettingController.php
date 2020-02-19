<?php

namespace App\Http\Controllers\System;

use App\System\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use System;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        dd(System::system());
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
        //
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
        //
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
        //
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
