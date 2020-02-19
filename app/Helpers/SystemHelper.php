<?php
namespace App\Helpers;

use App\System\Setting;

class SystemHelper
{
    /**
     * summary
     */

    public static function system()
    {
        $setting = new Setting();

        return $setting->system();
    }
}