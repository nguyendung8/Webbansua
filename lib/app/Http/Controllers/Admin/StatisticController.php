<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VpProduct;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function getStatistic()
    {
        $total_sold = VpProduct::sum('prod_total_sold');
        $product_out_of_lock = VpProduct::where('prod_status', 0)->get();
        $product_bestseller = VpProduct::where('prod_featured', 1)->take(5)->get();
        return view('backend.statistic', compact('product_out_of_lock','product_bestseller', 'total_sold'));
    }
}
