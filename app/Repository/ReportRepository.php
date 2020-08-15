<?php


namespace App\Repository;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportRepository
{
	function saleReport()
	{
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


	function saleReportSearch(Request $request)
	{
		$query = DB::table('sales')
			->join('currencies AS from_currency', 'sales.from_currency_id', '=', 'from_currency.id')
			->join('currencies AS to_currency', 'sales.to_currency_id', '=', 'to_currency.id')
			->join('users AS user', 'sales.user_id', '=', 'user.id');
			if ($request->user_id != '' && $request->user_id != null) {
				$query->where('user_id', $request->user_id);
			}
			if ($request->from_date != '' && $request->from_date != null) {
				$query->whereDate('sales.created_at', '>=', date('Y-m-d', strtotime($request->from_date)));
			}
			if ($request->to_date != '' && $request->to_date != null) {
				$query->whereDate('sales.created_at', '<=', date('Y-m-d', strtotime($request->to_date)));
			}
			$query->select([
				'sales.*',
				'from_currency.name AS from_currency_name',
				'from_currency.symbol AS from_currency_symbol',
				'to_currency.name AS to_currency_name',
				'to_currency.symbol AS to_currency_symbol',
				'user.name AS user_name']);

		return $query->get();
	}

	function rateReport() {
		return DB::table('rate_detail_tracking AS tracking')
			->join('currencies AS from_currency', 'tracking.from_currency_id', '=', 'from_currency.id')
			->join('currencies AS to_currency', 'tracking.to_currency_id', '=', 'to_currency.id')
			->join('users AS users', 'tracking.user_id', '=', 'users.id')
			->select(['tracking.*', 'from_currency.name AS from_currency_name', 'to_currency.name AS to_currency_name', 'to_currency.symbol AS to_currency_symbol', 'users.name AS created_by_name'])
			->get();
	}

	function rateReportSearch(Request $request) {
		$query = DB::table('rate_detail_tracking AS tracking')
			->join('currencies AS from_currency', 'tracking.from_currency_id', '=', 'from_currency.id')
			->join('currencies AS to_currency', 'tracking.to_currency_id', '=', 'to_currency.id')
			->join('users AS users', 'tracking.user_id', '=', 'users.id');
			if ($request->currency_id != '' && $request->currency_id != null) {
				$query->where('from_currency_id', $request->currency_id);
			}
			if ($request->date != '' && $request->date != null) {
				$query->whereDate('tracking.created_at', date('Y-m-d', strtotime($request->date)));
			}
			$query->select([
				'tracking.*',
				'from_currency.name AS from_currency_name',
				'to_currency.name AS to_currency_name',
				'to_currency.symbol AS to_currency_symbol',
				'users.name AS created_by_name']);

			return $query->get();
	}
}
