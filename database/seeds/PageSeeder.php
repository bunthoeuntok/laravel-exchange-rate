<?php

use Illuminate\Database\Seeder;
use App\User\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Page::create([
            'name'     => 'User',
            'slug'    => 'user',
        ]);
        Page::create([
            'name'     => 'Role',
            'slug'    => 'role',
        ]);
        Page::create([
            'name'     => 'Page',
            'slug'    => 'page',
        ]);

        Page::create([
            'name'     => 'Permission',
            'slug'    => 'permission',
        ]);

        Page::create([
            'name'     => 'System',
            'slug'    => 'system',
        ]);

        Page::create([
            'name'     => 'Currency',
            'slug'    => 'currency',
        ]);

        Page::create([
            'name'     => 'Rate Setup',
            'slug'    => 'rate',
        ]);

        Page::create([
            'name'     => 'Transfer Money',
            'slug'    => 'transfer',
        ]);

        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
