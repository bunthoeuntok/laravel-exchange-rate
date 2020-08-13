<?php

namespace App\Http\Controllers\User;

use App\User\Page;
use App\User\Permission;
use App\User\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$roles = Role::where('slug', '!=', 'administrator')->get();
    	$pages = Page::all();
        return view('user-management.permissions.index', [
        	'roles' => $roles,
			'pages' => $pages
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
     * @param  \App\User\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }

    public function editRolePermission($roleId)
	{
		$role = Role::findOrFail($roleId);
		$pages = Page::all();
		return view('user-management.permissions.edit', [
			'role' => $role,
			'pages' => $pages
		]);
	}

	public function saveRolePermission($roleId, Request $request)
	{
		$role = Role::findOrFail($roleId);
		$role->permissions()->sync($request->permission_id);

		return redirect()->route('user-management.permissions.index');
	}
}
