<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VpProduct;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function getStatistic()
    {
        $product_out_of_lock = VpProduct::where('prod_status', 0)->get();
        return view('backend.statistic', compact('product_out_of_lock'));
    }
}
