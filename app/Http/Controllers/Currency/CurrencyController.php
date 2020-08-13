<?php

namespace App\Http\Controllers\Currency;

use App\Currency\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$currencies = Currency::all();
        return view('currencies.currencies.index', [
        	'currencies' => $currencies
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
     * @param  \App\Curreny\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curreny\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        return view('currencies.currencies.edit', [
        	'currency' => $currency
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curreny\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currency $currency)
    {
        $request->validate([
        	'name' => 'required',
			'symbol' => 'required|unique:currencies,symbol,'. $currency->id
		]);

        $currency->name = $request->name;
        $currency->name_kh = $request->name_kh;
        $currency->symbol = $request->symbol;
        $currency->save();
        return redirect()->route('currency.currencies.index');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Curreny\Currency $currency
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
    public function destroy(Currency $currency)
    {
        $currency->delete();
        return redirect()->route('currency.currencies.index');
    }
}
