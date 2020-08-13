<?php

use App\Currency\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create([
        	'name' => 'Dollar',
        	'name_kh' => 'ដុល្លា',
        	'symbol' => '$',
		]);
        Currency::create([
        	'name' => 'Riel',
        	'name_kh' => 'រៀល',
        	'symbol' => '៛',
		]);
        Currency::create([
        	'name' => 'Baht',
        	'name_kh' => 'បាត',
        	'symbol' => '฿',
		]);
    }
}
