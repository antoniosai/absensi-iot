<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helper\DataGenerator as MY_data;

class DataDasar extends Controller
{
    public function tingkat()
    {
        return response()->json(MY_data::list_tingkat);
    }
}
