<?php

use App\Models\Settings;

if (!function_exists('appSetting')) {
    function appSetting()
    {
        return Settings::first();
    }
}

if (!function_exists('timesInd')) {
    function timesInd($date)
    {
        $Bulan = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $result = $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun;

        return $result;
    }
}
