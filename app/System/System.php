<?php

namespace App\System;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
	protected $fillable = ['name', 'title', 'description', 'logo', 'icon'];

    public function app() {
    	return \DB::table('systems')
    			->select('*')
    			->first();
    }
    
}
