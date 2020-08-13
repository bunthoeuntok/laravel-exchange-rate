<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    public function permissions()
	{
		return $this->hasMany(Permission::class);
	}
}
