<?php

use Illuminate\Database\Seeder;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return voidc
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \DB::statement('TRUNCATE TABLE systems');
        \DB::statement('INSERT INTO systems(name, title, logo, icon, description) VALUES("Money Exchange System", "X-Change", "images/system/logo.png", "images/system/icon.ico", "School System Management")');
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
