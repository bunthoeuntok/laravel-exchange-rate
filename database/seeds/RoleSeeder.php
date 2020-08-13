<?php

use Illuminate\Database\Seeder;
use App\User\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Role::create([
            'name'     => 'Administrator',
            'slug'    => 'administrator',
            'description' => ""
        ]);
        Role::create([
            'name'     => 'Owner',
            'slug'    => 'owner',
            'description' => ""
        ]);
        Role::create([
            'name'     => 'Seller',
            'slug'    => 'seller',
            'description' => ""
        ]);

        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
