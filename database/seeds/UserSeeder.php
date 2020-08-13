<?php

use App\User\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::create([
            'name'     => 'Bunthoeun Tok',
            'email'    => 'bunthoeun.code@gmail.com',
            'password' => bcrypt('admin'),
            'role_id'  => 1,
			'profile'	=> 'storage/uploads/images/users/no-image.png'
        ]);
        User::create([
            'name'     => 'Owner',
            'email'    => 'owner@gmail.com',
            'password' => bcrypt('owner'),
            'role_id'  => 2,
			'profile'	=> 'storage/uploads/images/users/no-image.png'
        ]);
        User::create([
            'name'     => 'Seller',
            'email'    => 'seller@gmail.com',
            'password' => bcrypt('seller'),
            'role_id'  => 3,
			'profile'	=> 'storage/uploads/images/users/no-image.png'
        ]);

        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
