<?php

namespace App\Http\Controllers\System;

use App\Currency\Currency;
use App\Http\Controllers\Controller;
use App\Sale\Sale;
use App\User\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
    	$users = User::all();
    	$currencies = Currency::all();
    	$sales = Sale::all();
    	return view('dashboard.index', [
    		'users' => $users,
    		'currencies' => $currencies,
			'sales' => $sales
		]);
    }
}
