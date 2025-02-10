<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\LunarHelper;

class LunarCalendarController extends Controller
{
    public function index()
    {
        $lunarDate = LunarHelper::getLunarDate();
        return view('Lunar.index', compact('lunarDate'));
    }

}
