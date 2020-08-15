<?php

namespace App\Http\Controllers\Report;

use App\Currency\Currency;
use App\Report\Report;
use App\Repository\ReportRepository;
use App\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
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
    	$users = User::all();
		$sales = $this->reportRepository->saleReport();
        return view('reports.reports.index', [
        	'sales' => $sales,
			'users' => $users,
			'currencies' => $currencies
		]);
    }

    function search(Request $request) {
    	$currencies = Currency::all();
    	$users = User::all();
		$sales = $this->reportRepository->saleReportSearch($request);
        return view('reports.reports.index', [
        	'sales' => $sales,
			'users' => $users,
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
     * @param  \App\Report\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
