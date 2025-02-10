<?php

namespace App\Helpers;

use LunarCalendar;

class LunarHelper
{
    public static function getLunarDate($date = null)
    {
        $date = $date ?: now(); // Nếu không có ngày truyền vào thì lấy ngày hiện tại
        $lunar = LunarCalendar::convertSolarToLunar(
            $date->year, $date->month, $date->day, 7
        );

        return [
            'day' => $lunar[0],
            'month' => $lunar[1],
            'year' => $lunar[2],
            'is_leap' => $lunar[3], // 1 nếu là tháng nhuận, 0 nếu không
        ];
    }
}
