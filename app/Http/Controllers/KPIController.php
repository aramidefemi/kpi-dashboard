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

    public function GetNewSellers (Request $request, $interval)
    {
        $merchants = DB::select('SELECT COUNT(*) as count FROM `users` INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;', [ 'interval' => $interval]);
        return [
            'data' =>  $merchants
        ];
    }
    public function GetMerchants (Request $request, $start, $end)
    {
        $merchants = User::groupBy('users.id')
        ->join('products', 'users.id', '=', 'products.merchant_id')
        // ->whereBetween('users.created_at', [$start, $end])
        ->count();
        return [
            'data' =>  $merchants
        ];
    }


    public function GetUniqueSellers (Request $request)
    {

        $sellers = DB::select('SELECT users.id as count FROM users INNER JOIN purchases ON users.id=purchases.merchant_id GROUP BY users.id');
        return [
            'data' =>  count($sellers)
        ];
    }
    public function GetMerchantsMedian (Request $request)
    {
        $sellers = DB::select('SELECT users.id as count FROM users INNER JOIN purchases ON users.id=purchases.merchant_id GROUP BY users.id');
        return [
            'data' =>     []
        ];
    }
}
