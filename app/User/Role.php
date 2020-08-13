<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    public function users()
	{
		return $this->hasMany(User::class);
	}

	public function permissions()
	{
		return $this->belongsToMany(Permission::class)->withTimestamps();
	}

	function rolePermission()
	{
		return $this->permissions()->pluck('id')->toArray();
	}
}
