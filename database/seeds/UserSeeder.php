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
            'password' => bcrypt('admin')
        ]);

        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
