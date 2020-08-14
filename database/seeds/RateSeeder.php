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
    }
}
