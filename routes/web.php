<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => false]);
Route::get('/', 'System\DashboardController@index')->name('home')->middleware(['auth']);

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
		Route::resource('rates', 'RateController');
		Route::get('transfers/{transfer}/receive', 'TransferController@receive')->name('transfers.receive');
		Route::resource('transfers', 'TransferController');
	}


);// Currency Modules
Route::group([
		'prefix'		=> 'sale',
		'as'			=> 'sale.',
		'middleware'	=> ['auth'],
		'namespace'		=> 'Sale',
	],
	function() {
		Route::get('sales/get-to-currencies', 'SaleController@getToCurrencies')->name('sales.get-to-currencies');
		Route::get('sales/get-exchange-rate', 'SaleController@getExchangeRate')->name('sales.get-exchange-rate');
		Route::get('sales/get-currency-amount', 'SaleController@getTotalMoney')->name('sales.get-currency-amount');
		Route::resource('sales', 'SaleController');
	}
);


// Currency Modules
Route::group([
		'prefix'		=> 'report',
		'as'			=> 'report.',
		'middleware'	=> ['auth'],
		'namespace'		=> 'Report',
	],
	function() {
		Route::get('reports/search', 'ReportController@search')->name('reports.search');
		Route::resource('reports', 'ReportController');
		Route::get('rate-reports/search', 'RateReportController@search')->name('rate-reports.search');
		Route::resource('rate-reports', 'RateReportController');
	}
);
