<?php

use Illuminate\Database\Seeder;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \DB::statement('TRUNCATE TABLE systems');
        \DB::statement('INSERT INTO systems(name, logo, icon, description) VALUES("School System", "images/system/logo.png", "images/system/icon.ico", "School System Management")');
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
