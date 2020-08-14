<?php

namespace App\Http\Controllers\Sale;

use App\Currency\Currency;
use App\Repository\RateRepository;
use App\Sale\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{

	/**
	 * @var RateRepository
	 */
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
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$currencies = Currency::all();
    	return view('sales.sales.create', [
    		'currencies' => $currencies
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
        dd($request);
    }

    function getToCurrencies(Request $request) {
		$currencies = Currency::where('id', '!=', $request->id)->get();

		$options = "<option value=''>Select Currency</option>";
		foreach ($currencies as $currency) {
			$options .= "<option value='$currency->id'>$currency->name</option>";
		}

		echo $options;
	}

    function getExchangeRate(Request $request) {
		$from = $request->from_id;
		$to = $request->to_id;

		$rate = $this->rateRepository->getRateByCurrency($from, $to);

		echo json_encode(
			array(
				'rate' => $rate,
			)
		);
	}

	function getTotalMoney($currentId)
	{
		$curencyAount = $this->rateRepository->
	}


    /**
     * Display the specified resource.
     *
     * @param  \App\Sale\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
