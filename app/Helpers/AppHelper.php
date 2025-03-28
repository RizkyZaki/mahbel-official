<?php

use App\Models\Settings;

if (!function_exists('appSetting')) {
    function appSetting()
    {
        return Settings::first();
    }
}
