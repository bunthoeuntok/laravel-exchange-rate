<?php

namespace App\Http\Middleware;

use App\User\Permission;
use App\User\Role;
use App\User\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AccessGate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	$user = Auth::user();


        if(!app()->runningInConsole() && $user)
        {
            if ($user->isAdmin()) {
                $permissions = Permission::all();
                foreach ($permissions as $permission) {
                    Gate::define($permission->slug, function () {
                        return true;
                    });
                }
            } else {
            	$permissions = [];
            	$role = $user->role;
                $pagePermissions = DB::table('permissions')
					->join('permission_role', 'permissions.id', '=', 'permission_role.permission_id')
					->join('pages', 'permissions.page_id', '=', 'pages.id')
					->where('permission_role.role_id', $role->id)
					->select('permissions.*')
					->get();

                foreach ($pagePermissions as $pagePermission) {
                	$permissions[$pagePermission->slug][] = $role->id;
                }

                foreach ($permissions as $name => $roles) {

                    Gate::define($name, function()  {
                        return true;
                    });
                }
            }

        }
        return $next($request);
    }
}
