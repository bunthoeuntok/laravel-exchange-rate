<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\System\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('system.systems.index');
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
     * @param  \App\System\System  $system
     * @return \Illuminate\Http\Response
     */
    public function show(System $system)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\System\System  $system
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
     * @param  \App\System\System  $system
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, System $system)
    {
        $this->validate(request(), [
            'name' => 'required',
            'logo' => 'nullable|sometimes|image|mimes:jpeg,png,jpg,svg|max:1024',
            'icon' => 'nullable|sometimes|image|mimes:jpeg,png,jpg,svg|max:1024',
        ]);

        $system->name        = $request->name;
        $system->description = $request->description;

        if ($request->hasFile('logo')) {
            $logo     = $request->file('logo');
            $fileName = 'uploads/images/system/logo.' . $logo->getClientOriginalExtension();

            $img = Image::make($logo->getRealPath());
            $img->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream();
            Storage::disk('local')->put('public/' . $fileName, $img, 'public');
            $system->logo = 'storage/' .$fileName;
        }
        if ($request->hasFile('icon')) {
            $icon     = $request->file('icon');
            $fileName = 'uploads/images/system/icon.' . $icon->getClientOriginalExtension();

            $img = Image::make($icon->getRealPath());
            $img->resize(40, 40, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream();
            Storage::disk('local')->put('public/' . $fileName, $img, 'public');
            $system->icon = 'storage/' .$fileName;
        }

        $system->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\System\System  $system
     * @return \Illuminate\Http\Response
     */
    public function destroy(System $system)
    {
        //
    }
}
