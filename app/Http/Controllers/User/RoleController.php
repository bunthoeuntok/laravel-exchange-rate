<?php

namespace App\Http\Controllers\User;

use App\User\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
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
    	$roles = Role::all();
		return view('user-management.roles.index', [
			'roles' => $roles
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
     * @param  \App\User\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('user-management.roles.edit', [
        	'role' => $role
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
        	'name' => 'required|unique:roles,name,'.$role->id
		]);
		$slug = strtolower(preg_replace($this->pattern, '', $request->name));
        $role->name = $request->name;
        $role->slug = $slug;
        $role->description = $request->description;
        $role->save();

        return redirect()->route('user-management.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('user-management.roles.index');

    }
}
