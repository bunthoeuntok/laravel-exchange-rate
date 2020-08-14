<?php


namespace App\Repository;


use App\Currency\Transfer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransferRepository
{
	function allTransfers()
	{
		return DB::table('transfers')
			->join('users AS from_user', 'transfers.from_user_id', '=', 'from_user.id')
			->join('users AS to_user', 'transfers.to_user_id', '=', 'to_user.id')
			->join('currencies', 'transfers.currency_id', '=', 'currencies.id')
			->select(['transfers.*', 'from_user.name AS from_user_name', 'to_user.name AS to_user_name', 'currencies.name AS currency_name', 'currencies.symbol AS currency_symbol'])
			->get();
	}

	function getTransfer($id)
	{
		return DB::table('transfers')
			->join('users AS from_user', 'transfers.from_user_id', '=', 'from_user.id')
			->join('users AS to_user', 'transfers.to_user_id', '=', 'to_user.id')
			->join('currencies', 'transfers.currency_id', '=', 'currencies.id')
			->where('transfers.id', $id)
			->select(['transfers.*', 'from_user.name AS from_user_name', 'to_user.name AS to_user_name', 'currencies.name AS currency_name', 'currencies.symbol AS currency_symbol'])
			->first();
	}

	function save(Request $request)
	{
		$amounts = $request->amount;
		foreach ($amounts as $currencyId => $amount) {
			DB::table('transfers')
				->insert([
					'from_user_id'	=> Auth::user()->id,
					'to_user_id'	=> $request->to_user_id,
					'currency_id'	=> $currencyId,
					'amount'		=> $amount
				]);
		}
	}

	function update(Request $request, Transfer $transfer) {
		$transfer->to_user_id = $request->to_user_id;
		$transfer->amount = $request->amount;
		$transfer->save();
	}

	function receive(Transfer $transfer) {
		$transfer->is_received = true;
		$transfer->received_at = date('Y-m-d h:i:s');

		if ($transfer->save()) {
			DB::table('user_amount')
				->insert([
					'user_id' => $transfer->from_user_id,
					'currency_id' => $transfer->currency_id,
					'amount' => $transfer->amount * (-1),
					'created_at' => date('Y-m-d h:i:s')
				]);

			DB::table('user_amount')
				->insert([
					'user_id' => $transfer->to_user_id,
					'currency_id' => $transfer->currency_id,
					'amount' => $transfer->amount,
					'created_at' => date('Y-m-d h:i:s')
				]);
		}
	}


	function getTotalMoney($currencyId)
	{
		DB::table('user_amount')
			->where('currency_id', $currencyId)
			->whereDate('created_date', Carbon::today()->get())
			->select()
			->get();

	}
}
