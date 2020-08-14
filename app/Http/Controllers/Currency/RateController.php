<?php

namespace App\Http\Controllers\Currency;

use App\Currency\Rate;
use App\Repository\RateRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RateController extends Controller
{
	protected $rateRepository;

	public function __construct(RateRepository $rateRepository)
	{
		$this->rateRepository = $rateRepository;
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$rates = $this->rateRepository->allRates();
        return view('currencies.rates.index', [
			'rates' => $rates
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
     * @param  \App\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function show(Rate $rate)
    {
        //
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function edit($id)
    {
    	$rate = $this->rateRepository->getRate($id);
    	$details = $this->rateRepository->getRateDetail($id);
		return view('currencies.rates.edit', [
			'rate' => $rate,
			'rate_details' => $details
		]);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param Rate $rate
	 * @return void
	 */
    public function update(Request $request, Rate $rate)
    {
		$this->rateRepository->updateDetail($request, $rate);

		return redirect()->route('currency.rates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rate $rate)
    {
        //
    }
}
