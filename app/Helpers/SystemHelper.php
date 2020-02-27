<?php
namespace App\Helpers;

use App\System\System;

class SystemHelper
{
    /**
     * summary
     */
    public static function app() {
        $system = new System();
        return $system->app();
    }
}