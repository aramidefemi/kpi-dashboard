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
        ->selectRaw("currency, SUM(totalamount) as merchant_sales SUM(merchant_commission) as merchant_revenue, SUM(selar_profit) as profit")
        ->where('status', 'paid')
        ->whereBetween('transaction_date', [$start, $end])
        ->get();
        return [
            'data' => [ 'purchases' => $purchases]
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
            'data' => [ 'products' => $productCount]
        ];
    }

    public function GetNewSellers (Request $request,  $start, $end)
    {
        $newSellers = DB::select("SELECT COUNT(DISTINCT merchant_id) as new_sellers, MONTHNAME(transaction_date)  AS 'month', YEAR(transaction_date) as 'year'
            FROM (SELECT * FROM purchases WHERE `status` = 'paid' AND `merchant_id` != '1' AND `totalamount` > 0 GROUP BY merchant_id ORDER BY transaction_date DESC) rrr
            WHERE `merchant_id` != '1' AND transaction_date BETWEEN :start and :end
            GROUP BY MONTHNAME(transaction_date), YEAR(transaction_date) ORDER BY transaction_date DESC",
         [ 'start' =>  $start,  'end' => $end ]);
        return [
            'data' =>  [ 'new_seller' => $newSellers]
        ];
    }
    public function GetMerchants (Request $request, $start, $end)
    {
        $merchants = User::groupBy('users.id')
        ->join('products', 'users.id', '=', 'products.merchant_id')
        ->whereBetween('products.created_at', [$start, $end])
        ->get();
        return [
            'data' =>  [ 'merchants' => count($merchants)]
        ];
    }


    public function GetUniqueSellers (Request $request, $start, $end)
    {
        $sellers = DB::select("SELECT COUNT(DISTINCT merchant_id) AS 'unique_sellers',  MONTHNAME(transaction_date)  AS 'month', YEAR(transaction_date) as 'year'
        FROM purchases WHERE `status` = 'paid' AND `merchant_id` != '1' AND `totalamount` > 0   AND transaction_date BETWEEN :start and :end
        GROUP BY  MONTHNAME(transaction_date), YEAR(transaction_date) ORDER BY created_at DESC",
         [ 'start' =>  $start,  'end' => $end ]);
        return [
            'data' =>  [ 'sellers' => $sellers]
        ];
    }
    public function GetMerchantsMedian (Request $request, $start, $end)
    {


        $sellers = DB::select("         SELECT p.merchant_total_monthly_volume_ngn as median_average,  p.month, p.year FROM ( SELECT t.*, @row_num := @row_num + 1 AS row_num  FROM (
                SELECT  merchant_id,
                        SUM(case currency
                        when 'NGN' THEN  totalamount
                        when 'USD' THEN  ROUND(totalamount*386, 2)
                        when 'GBP' THEN  ROUND(totalamount*478.12, 2)
                        when 'KES' THEN  ROUND(totalamount*3.64, 2)
                        when 'GHS' THEN  ROUND(totalamount*66.95, 2)
                        when 'ZAR' THEN  ROUND((totalamount*22), 2)
                        ELSE 0 END) as merchant_total_monthly_volume_ngn,
                        MONTHNAME(transaction_date)  AS 'month', YEAR(transaction_date) as 'year'
                FROM purchases
                WHERE `status` = 'paid' AND `merchant_id` != '1' AND `totalamount` > 0 AND  transaction_date BETWEEN :start and :end
                GROUP BY  merchant_id, MONTHNAME(transaction_date), YEAR(transaction_date) ORDER BY merchant_total_monthly_volume_ngn ASC
            ) AS t,
            ( SELECT @row_num := 0 ) counter
            ) p
            WHERE
            p.row_num = ROUND (.50 * @row_num );",
         ['start' =>  $start,  'end' => $end ] )
        ;
        return [
            'data' =>  $sellers[0]
        ];
    }
}


