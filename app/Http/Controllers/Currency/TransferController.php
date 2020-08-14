<?php

namespace App\Http\Controllers\Currency;

use App\Currency\Currency;
use App\Currency\Transfer;
use App\Repository\TransferRepository;
use App\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
	protected $transferRepository;

	public function __construct(TransferRepository $transferRepository)
	{
		$this->transferRepository = $transferRepository;
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$transfers = $this->transferRepository->allTransfers();
    	return view('currencies.transfers.index', [
    		'transfers'	=> $transfers
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currencies = Currency::all();
    	$users = User::where('id', '!=', Auth::user()->id)->get();
    	return view('currencies.transfers.create', [
    		'currencies' => $currencies,
			'users'	=> $users
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
    	$this->transferRepository->save($request);
    	return redirect()->route('currency.transfers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Currency\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function show(Transfer $transfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Currency\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$transfer = $this->transferRepository->getTransfer($id);
    	$users = User::where('id', '!=', Auth::user()->id)->get();
        return view('currencies.transfers.edit', [
        	'transfer' => $transfer,
			'users' => $users
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Currency\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transfer $transfer)
    {
		$this->transferRepository->update($request, $transfer);
		return redirect()->route('currency.transfers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Currency\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transfer $transfer)
    {
        $transfer->delete();
        return redirect()->route('currency.transfers.index');
    }

    public function receive(Transfer $transfer) {
    	$this->transferRepository->receive($transfer);

    	return redirect()->route('currency.transfers.index');
	}
}
