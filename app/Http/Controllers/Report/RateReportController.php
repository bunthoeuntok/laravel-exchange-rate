<?php

namespace App\Http\Controllers\Report;

use App\Currency\Currency;
use App\Report\RateReport;
use App\Repository\ReportRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RateReportController extends Controller
{
	/**
	 * @var ReportRepository
	 */
	protected $reportRepository;

	public function __construct(ReportRepository $reportRepository)
	{
		$this->reportRepository = $reportRepository;
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$currencies = Currency::all();
		$rates = $this->reportRepository->rateReport();
		return view('reports.rates.index', [
			'rates' => $rates,
			'currencies' => $currencies

		]);
    }

    function search(Request $request)
	{
		$currencies = Currency::all();
		$rates = $this->reportRepository->rateReportSearch($request);
		return view('reports.rates.index', [
			'rates' => $rates,
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
     * @param  \App\Report\RateReport  $rateReport
     * @return \Illuminate\Http\Response
     */
    public function show(RateReport $rateReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report\RateReport  $rateReport
     * @return \Illuminate\Http\Response
     */
    public function edit(RateReport $rateReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report\RateReport  $rateReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RateReport $rateReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report\RateReport  $rateReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(RateReport $rateReport)
    {
        //
    }
}
