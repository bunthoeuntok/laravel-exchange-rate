<?php

namespace App\Currency;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    function toCurrency()
	{
		return $this->belongsTo(Currency::class, 'to_currency_id');
	}
}
