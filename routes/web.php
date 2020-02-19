<?php

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

		Route::resource('setting', 'SettingController');
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
		Route::get('users/export', 'UserController@export')->name('users.export');
		Route::get('users/get', 'UserController@getUsers')->name('users.get');
		Route::resource('users', 'UserController');
	}
);
