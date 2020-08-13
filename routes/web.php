<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => false]);
Route::get('/', 'System\DashboardController@index')->middleware(['auth']);

Route::group([
		'prefix'		=> 'system',
		'as'			=> 'system.',
		'middleware'	=> ['auth'],
		'namespace'		=> 'System',
	],
	function() {
		Route::get('/', 'DashboardController@index');
		Route::get('dashboard', 'DashboardController@index');
		Route::resource('settings', 'SettingController');
		Route::resource('systems', 'SystemController')->except(['create', 'store', 'show', 'edit', 'destroy']);
	}
);

// User Management Modules
Route::group([
		'prefix'		=> 'user-management',
		'as'			=> 'user-management.',
		'middleware'	=> ['auth'],
		'namespace'		=> 'User',
	],
	function() {
		Route::resource('roles', 'RoleController');
		Route::resource('users', 'UserController');
		Route::resource('pages', 'PageController');
		Route::get('permissions/edit-permission/{id}', 'PermissionController@editRolePermission')->name('permissions.edit-permission');
		Route::post('permissions/save-permission/{id}', 'PermissionController@saveRolePermission')->name('permissions.save-permission');
		Route::resource('permissions', 'PermissionController');
	}
);

// Currency Modules
Route::group([
		'prefix'		=> 'currency',
		'as'			=> 'currency.',
		'middleware'	=> ['auth'],
		'namespace'		=> 'Currency',
	],
	function() {
		Route::resource('currencies', 'CurrencyController');
	}
);
