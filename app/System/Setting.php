<?php

namespace App\System;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	public function system() {
		return \DB::table('systems')->first();
	}

}
