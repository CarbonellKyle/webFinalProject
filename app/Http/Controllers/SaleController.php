<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SaleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:administrator|superadministrator');
    }

    public function saleDaily()
    {
        $products = DB::table('products')->get();
        $numRows = count($products);

        $purchased = DB::table('order_details')->whereDate('order_date', today())->get();
        $p_length = count($purchased);
        $soldList = array();

        for($i=0; $i<$numRows; $i++)
        {
            $totalSold = 0;
            for($j=0; $j<$p_length; $j++)
            {
                if($products[$i]->name==$purchased[$j]->product_name)
                {
                    $totalSold += $purchased[$j]->order_qty;
                }
            }
            $soldList[$i] = $totalSold;
        }

        return view('sale.daily', compact('products', 'numRows', 'soldList'));
    }

    public function saleMonthly()
    {
        $products = DB::table('products')->get();
        $numRows = count($products);

        $purchased = DB::table('order_details')
            ->whereYear('order_date', now()->year)
            ->whereMonth('order_date', now()->month)->get();
        $p_length = count($purchased);
        $soldList = array();

        for($i=0; $i<$numRows; $i++)
        {
            $totalSold = 0;
            for($j=0; $j<$p_length; $j++)
            {
                if($products[$i]->name==$purchased[$j]->product_name)
                {
                    $totalSold += $purchased[$j]->order_qty;
                }
            }
            $soldList[$i] = $totalSold;
        }

        return view('sale.monthly', compact('products', 'numRows', 'soldList'));
    }
}
