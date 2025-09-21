<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    public static function format($date, $format = 'd M Y')
    {
        if (!$date) return '-';
        return Carbon::parse($date)->translatedFormat($format);
    }

    public static function formatWithTime($date)
    {
        return self::format($date, 'd M Y H:i');
    }
}
