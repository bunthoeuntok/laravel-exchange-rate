<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	public function roles()
	{
		return $this->belongsToMany(Role::class)->withTimestamps();
	}

	public function page()
	{
		return $this->belongsTo(Page::class);
	}
}
