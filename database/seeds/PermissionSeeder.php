<?php

use Illuminate\Database\Seeder;
use App\User\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		\DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		Permission::create([
			'page_id'	=> 1,
			'name'	=> 'Access User',
			'slug'	=> 'user.access'
		]);
		Permission::create([
			'page_id'	=> 1,
			'name'	=> 'Create User',
			'slug'	=> 'user.create'
		]);
		Permission::create([
			'page_id'	=> 1,
			'name'	=> 'Update User',
			'slug'	=> 'user.update'
		]);
		Permission::create([
			'page_id'	=> 1,
			'name'	=> 'Delete User',
			'slug'	=> 'user.delete'
		]);



		Permission::create([
			'page_id'	=> 2,
			'name'	=> 'Access Role',
			'slug'	=> 'role.access'
		]);
		Permission::create([
			'page_id'	=> 2,
			'name'	=> 'Update Role',
			'slug'	=> 'role.update'
		]);
		Permission::create([
			'page_id'	=> 2,
			'name'	=> 'Delete Role',
			'slug'	=> 'role.delete'
		]);



		Permission::create([
			'page_id'	=> 3,
			'name'	=> 'Access Page',
			'slug'	=> 'page.access'
		]);
		Permission::create([
			'page_id'	=> 3,
			'name'	=> 'Update Page',
			'slug'	=> 'page.update'
		]);
		Permission::create([
			'page_id'	=> 3,
			'name'	=> 'Delete Page',
			'slug'	=> 'page.delete'
		]);


		Permission::create([
			'page_id'	=> 4,
			'name'	=> 'Access Permission',
			'slug'	=> 'permission.access'
		]);
		Permission::create([
			'page_id'	=> 4,
			'name'	=> 'Update Permission',
			'slug'	=> 'permission.update'
		]);
		Permission::create([
			'page_id'	=> 4,
			'name'	=> 'Delete Permission',
			'slug'	=> 'permission.delete'
		]);




		Permission::create([
			'page_id'	=> 5,
			'name'	=> 'Access System',
			'slug'	=> 'system.access'
		]);




		Permission::create([
			'page_id'	=> 6,
			'name'	=> 'Access Currency',
			'slug'	=> 'currency.access'
		]);
		Permission::create([
			'page_id'	=> 6,
			'name'	=> 'Update Currency',
			'slug'	=> 'currency.update'
		]);
		Permission::create([
			'page_id'	=> 6,
			'name'	=> 'Delete Currency',
			'slug'	=> 'currency.delete'
		]);



		Permission::create([
			'page_id'	=> 7,
			'name'	=> 'Access Rate',
			'slug'	=> 'rate.access'
		]);
		Permission::create([
			'page_id'	=> 7,
			'name'	=> 'Update Rate',
			'slug'	=> 'rate.update'
		]);
		Permission::create([
			'page_id'	=> 7,
			'name'	=> 'Delete Rate',
			'slug'	=> 'rate.delete'
		]);


		Permission::create([
			'page_id'	=> 8,
			'name'	=> 'Access Transfer',
			'slug'	=> 'transfer.access'
		]);
		Permission::create([
			'page_id'	=> 8,
			'name'	=> 'Create Transfer',
			'slug'	=> 'transfer.create'
		]);
		Permission::create([
			'page_id'	=> 8,
			'name'	=> 'Update Transfer',
			'slug'	=> 'transfer.update'
		]);
		Permission::create([
			'page_id'	=> 8,
			'name'	=> 'Delete Transfer',
			'slug'	=> 'transfer.delete'
		]);

		\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
