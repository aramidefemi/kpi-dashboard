<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class KPIController extends Controller
{
    public function GetTransactions (Request $request)
    {
        $purchases = Purchase::groupBy('currency')
        ->selectRaw("currency, SUM(totalamount) as sales, COUNT(code) as count, SUM(merchant_commission) as merchant_revenue, SUM(selar_profit) as profit")
        ->get();
        return [
            'data' => $purchases
        ];
    }
    public function GetUsersCount (Request $request)
    {
        $count = User::all()->count();

        return [
            'data' => [ 'users' => $count]
        ];
    }
    public function GetProductsCountByInterval (Request $request, $interval)
    {
        // $date = new DateTime($dt2);
        // $dt2=$date->format('Y-m-d');

        $product =  DB::select('SELECT COUNT(*) as count FROM `products` WHERE created_at BETWEEN DATE_SUB(CURDATE(), INTERVAL :interval DAY) AND CURDATE()', [ 'interval' => $interval]);

        return [
            'data' =>  $product[0]
        ];
    }

    public function GetNewSellers (Request $request)
    {


        return [
            'data' =>     []
        ];
    }
    public function GetMerchants (Request $request)
    {

        return [
            'data' =>     []
        ];
    }

    public function GetUniqueSellers (Request $request)
    {

        return [
            'data' =>     []
        ];
    }
    public function GetMerchantsMedian (Request $request)
    {

        return [
            'data' =>     []
        ];
    }
}
