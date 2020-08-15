<?php

use Illuminate\Database\Seeder;
use App\Currency\Rate;
use Illuminate\Support\Facades\DB;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rate::create([
        	'from_currency_id' => 1,
			'created_by' => 1
		]);

        DB::insert('insert into rate_detail (rate_id, to_currency_id, exchange_rate) values (?, ?, ?)', [1, 2, 4100]);
        DB::insert('insert into rate_detail (rate_id, to_currency_id, exchange_rate) values (?, ?, ?)', [1, 3, 32]);


        DB::insert('insert into rate_detail_tracking (from_currency_id, to_currency_id, exchange_rate, user_id, created_at) values (?, ?, ?, ?, ?)', [1, 2, 4100, 1, date('Y-m-d h:i:s')]);
        DB::insert('insert into rate_detail_tracking (from_currency_id, to_currency_id, exchange_rate, user_id, created_at) values (?, ?, ?, ?, ?)', [1, 3, 32, 1, date('Y-m-d h:i:s')]);


        Rate::create([
        	'from_currency_id' => 2,
			'created_by' => 1
		]);

        DB::insert('insert into rate_detail (rate_id, to_currency_id, exchange_rate) values (?, ?, ?)', [2, 1, 0.00025]);
        DB::insert('insert into rate_detail (rate_id, to_currency_id, exchange_rate) values (?, ?, ?)', [2, 3, 0.01]);
        DB::insert('insert into rate_detail_tracking (from_currency_id, to_currency_id, exchange_rate, user_id, created_at) values (?, ?, ?, ?, ?)', [2, 1, 0.00025, 1, date('Y-m-d h:i:s')]);
        DB::insert('insert into rate_detail_tracking (from_currency_id, to_currency_id, exchange_rate, user_id, created_at) values (?, ?, ?, ?, ?)', [2, 3, 0.01, 1, date('Y-m-d h:i:s')]);


        Rate::create([
        	'from_currency_id' => 3,
			'created_by' => 1
		]);

        DB::insert('insert into rate_detail (rate_id, to_currency_id, exchange_rate) values (?, ?, ?)', [3, 1, 0.03125]);
        DB::insert('insert into rate_detail (rate_id, to_currency_id, exchange_rate) values (?, ?, ?)', [3, 2, 100]);
        DB::insert('insert into rate_detail_tracking (from_currency_id, to_currency_id, exchange_rate, user_id, created_at) values (?, ?, ?, ?, ?)', [3, 1, 0.03125, 1, date('Y-m-d h:i:s')]);
        DB::insert('insert into rate_detail_tracking (from_currency_id, to_currency_id, exchange_rate, user_id, created_at) values (?, ?, ?, ?, ?)', [3, 2, 100, 1, date('Y-m-d h:i:s')]);
    }
}
