<?php


namespace App\Repository;


use App\Sale\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaleRepository
{
	function allSales() {
		return DB::table('sales')
			->join('currencies AS from_currency', 'sales.from_currency_id', '=', 'from_currency.id')
			->join('currencies AS to_currency', 'sales.to_currency_id', '=', 'to_currency.id')
			->join('users AS user', 'sales.user_id', '=', 'user.id')
			->select([
				'sales.*',
				'from_currency.name AS from_currency_name',
				'from_currency.symbol AS from_currency_symbol',
				'to_currency.name AS to_currency_name',
				'to_currency.symbol AS to_currency_symbol',
				'user.name AS user_name'])
			->get();
	}

	function getTotalMoney($currencyId)
	{
		return DB::table('user_amount')
			->where('currency_id', $currencyId)
			->whereDate('created_at', date('Y-m-d'))
			->where('user_id', Auth::user()->id)
			->select(DB::raw('SUM(amount) AS total_amount'))
			->first();
	}

	function save(Request $request)
	{
		$sale = new Sale();
		$sale->user_id = Auth::user()->id;
		$sale->from_currency_id = $request->from_currency;
		$sale->to_currency_id = $request->to_currency;
		$sale->amount = $request->amount;
		$sale->rate = $request->rate;
		$sale->total_exchange_amount = $request->rate * $request->amount;

		if ($sale->save()) {
			DB::table('user_amount')
				->insert([
					'user_id' => Auth::user()->id,
					'currency_id' => $request->from_currency,
					'amount' => $request->amount,
					'created_at' => date('Y-m-d h:i:s')
				]);

			DB::table('user_amount')
				->insert([
					'user_id' => Auth::user()->id,
					'currency_id' => $request->to_currency,
					'amount' => $request->amount * $request->rate * (-1),
					'created_at' => date('Y-m-d h:i:s')
				]);
		}
	}
}
