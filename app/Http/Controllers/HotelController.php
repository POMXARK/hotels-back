<?php

namespace App\Http\Controllers;

use App\Events\CheckHotelRules;
use App\Models\Hotel;

class HotelController extends Controller
{
    public function index()
    {
        $hotel = Hotel::find(1);

        // Запускаем событие
        event(new CheckHotelRules($hotel));

        //...
    }
}
