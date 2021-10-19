<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class KPIController extends Controller
{
    public function GetTransactions (Request $request, $start, $end)
    {
        $purchases = Purchase::groupBy('currency')
        ->selectRaw("currency, SUM(totalamount) as sales, COUNT(code) as count, SUM(merchant_commission) as merchant_revenue, SUM(selar_profit) as profit")
        ->whereBetween('created_at', [$start, $end])
        ->get();
        return [
            'data' => $purchases
        ];
    }
    public function GetUsersCount (Request $request,  $start, $end)
    {
        $usersCount = DB::table('users')
        ->whereBetween('created_at', [$start, $end])
        ->count();
        return [
            'data' => [ 'users' => $usersCount]
        ];
    }
    public function GetProductsCountByInterval (Request $request, $start, $end)
    {
        $productCount = DB::table('products')
        ->whereBetween('created_at', [$start, $end])
        ->count();
        return [
            'data' =>  $productCount
        ];
    }

    public function GetNewSellers (Request $request,  $start, $end)
    {
        $newSellers = DB::select('SELECT COUNT(*) as count FROM ( SELECT * FROM purchases as d ORDER BY d.created_at ASC LIMIT 1 ) as dd WHERE dd.created_at BETWEEN :start and :end',
         [ 'start' =>  $start,  'end' => $end ]);
        return [
            'data' =>  $newSellers
        ];
    }
    public function GetMerchants (Request $request, $start, $end)
    {
        $merchants = User::groupBy('users.id')
        ->join('products', 'users.id', '=', 'products.merchant_id')
        ->whereBetween('users.created_at', [$start, $end])
        ->get();
        return [
            'data' =>  count($merchants)
        ];
    }


    public function GetUniqueSellers (Request $request, $start, $end)
    {

        $sellers = User::groupBy('users.id')
        ->join('purchases', 'users.id', '=', 'purchases.merchant_id')
        ->whereBetween('users.created_at', [$start, $end])
        ->get();
        return [
            'data' =>  count($sellers)
        ];
    }
    public function GetMerchantsMedian (Request $request, $start, $end)
    {
        $sellers = DB::select('SELECT AVG(dd.totalamount) AS median_val FROM ( SELECT d.totalamount, @rownum := @rownum +1 AS `row_number`, @total_rows := @rownum FROM purchases AS d, ( SELECT @rownum := 0 ) r WHERE d.created_at BETWEEN :start and :end ORDER BY d.totalamount ) AS dd WHERE dd.row_number IN( FLOOR((@total_rows +1) / 2), FLOOR((@total_rows +2) / 2) )',
         ['start' =>  $start,  'end' => $end ] )
        ;
        return [
            'data' =>  $sellers
        ];
    }
}


