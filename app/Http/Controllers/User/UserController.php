<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User\Role;
use App\User\User;
use Illuminate\Http\Request;
use App\Exports\UserExport;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Image;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$users = User::all();
        return view('user-management.users.index', [
            'users' => $users
        ]);
        // return view('user-management.users.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$roles = Role::all();
        return view('user-management.users.create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        	'name'	=> 'required|min:3',
			'email'		=> 'required|email|unique:users,email',
			'password'	=> 'required|min:6|confirmed',
			'role'	=> 'required'
		]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role;

        if ($request->hasFile('profile')) {
            $logo     = $request->file('profile');
            $fileName = 'uploads/images/users/' .time() . '.' .$logo->getClientOriginalExtension();

            $img = Image::make($logo->getRealPath());
            $img->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream();
            Storage::disk('local')->put('public/' . $fileName, $img, 'public');
            $user->profile = 'storage/' .$fileName;
        } else {
        	$user->profile = 'storage/uploads/images/users/no-image.png';
		}
        $user->save();

		return redirect()->route('user-management.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
    	$roles = Role::all();
        return view('user-management.users.edit', [
        	'user'	=> $user,
			'roles'	=> $roles
		]);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param User $user
	 * @return void
	 */
    public function update(Request $request, User $user)
    {
    	$request->validate([
        	'name'	=> 'required|min:3',
			'email'		=> 'required|email|unique:users,email,'.$user->id,
			'role'	=> 'required'
		]);

    	$user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role;

        if ($request->hasFile('profile')) {
            $logo     = $request->file('profile');
            $fileName = 'uploads/images/users/' .time() . '.' .$logo->getClientOriginalExtension();

            $img = Image::make($logo->getRealPath());
            $img->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream();
            Storage::disk('local')->put('public/' . $fileName, $img, 'public');
            $user->profile = 'storage/' .$fileName;
        }
        $user->save();
		return redirect()->route('user-management.users.index');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param User $user
	 * @return void
	 * @throws \Exception
	 */
    public function destroy(User $user)
    {
    	$user->delete();
        return redirect()->route('user-management.users.index');
    }

    public function export() {
        return Excel::download(new UserExport(), 'users.xlsx');
    }
}
