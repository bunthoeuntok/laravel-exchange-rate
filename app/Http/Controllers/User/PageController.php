<?php

namespace App\Http\Controllers\User;

use App\User\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
	protected  $pattern = array(
        '/ /',
        '/-/'
    );
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$pages = Page::all();
        return view('user-management.pages.index', [
        	'pages'	=> $pages
		]);
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
     * @param  \App\User\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('user-management.pages.edit', [
        	'page' => $page
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
        	'name' => 'required|unique:pages,name,'.$page->id
		]);
		$slug = strtolower(preg_replace($this->pattern, '', $request->name));
        $page->name = $request->name;
        $page->slug = $slug;
        $page->save();

        return redirect()->route('user-management.pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
