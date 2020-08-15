<?php


namespace App\Repository;


use App\Currency\Rate;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RateRepository
{
	function allRates()
	{
		return DB::table('rates')
			->join('currencies', 'rates.from_currency_id', '=', 'currencies.id')
			->join('users', 'rates.created_by', '=', 'users.id')
			->select(['rates.*', 'currencies.name AS from_currency_name', 'users.name AS created_by_name'])
			->get();
	}

	function getRate($id) {
		return DB::table('rates')
			->join('currencies AS from_currency', 'rates.from_currency_id', '=', 'from_currency.id')
			->select(['rates.*', 'from_currency.name AS from_currency_name'])
			->where('rates.id', $id)
			->first();


	}

	function getRateDetail($id)
	{
		return DB::table('rate_detail')

			->join('rates', 'rate_detail.rate_id', '=', 'rates.id')
			->join('currencies AS from_currency', 'rates.from_currency_id', '=', 'from_currency.id')
			->join('currencies AS to_currency', 'rate_detail.to_currency_id', '=', 'to_currency.id')
			->select(['rate_detail.*', 'from_currency.name AS from_currency_name', 'to_currency.name AS to_currency_name', 'to_currency.symbol AS to_currency_symbol'])
			->where('rates.id', $id)
			->get();
	}

	function getRateByCurrency($fromId, $toId)
	{
		return DB::table('rate_detail')

			->join('rates', 'rate_detail.rate_id', '=', 'rates.id')
			->join('currencies AS from_currency', 'rates.from_currency_id', '=', 'from_currency.id')
			->join('currencies AS to_currency', 'rate_detail.to_currency_id', '=', 'to_currency.id')
			->select(['rate_detail.*', 'from_currency.name AS from_currency_name', 'to_currency.name AS to_currency_name', 'to_currency.symbol AS to_currency_symbol'])
			->where('rates.from_currency_id', $fromId)
			->where('rate_detail.to_currency_id', $toId)
			->first();
	}

	function updateDetail(Request $request, Rate $rate)
	{
		$exchangeRates = $request->exchange_rate;
		foreach ($exchangeRates AS $detailId => $exchangeRate) {
			DB::table('rate_detail')
				->where('id', $detailId)
				->update([
					'exchange_rate' => $exchangeRate
				]);


			$toCurrencyId = DB::table('rate_detail')
				->where('id', $detailId)
				->first()
				->to_currency_id;
			$this->saveTrackingRate($rate, $toCurrencyId, $exchangeRate);
		}
		$rate->updated_by = Auth::user()->id;
		$rate->save();
	}

	function saveTrackingRate($rate, $toCurrencyId, $exchangeRate)
	{
		DB::table('rate_detail_tracking')
			->insert([
				'from_currency_id'	=> $rate->from_currency_id,
				'to_currency_id'	=> $toCurrencyId,
				'exchange_rate'		=> $exchangeRate,
				'user_id'			=> Auth::user()->id,
				'created_at'		=> date('Y-m-d h:i:s'),
				'updated_at'		=> date('Y-m-d h:i:s')
			]);

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
}
