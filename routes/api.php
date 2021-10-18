<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KPIController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



// kpi endpoints
Route::get('/kpi/users/{start}/{end}', [KPIController::class, 'GetUsersCount']);
Route::get('/kpi/transactions/{start}/{end}', [KPIController::class, 'GetTransactions']);

Route::get('/kpi/products/{start}/{end}', [KPIController::class, 'GetProductsCountByInterval']);
Route::get('/kpi/merchants/{start}/{end}', [KPIController::class, 'GetMerchants']);

Route::get('/kpi/sellers/new', [KPIController::class, 'GetNewSellers']);
Route::get('/kpi/sellers/{interval}', [KPIController::class, 'GetUniqueSellers']);

Route::get('/kpi/merchants/median', [KPIController::class, 'GetMerchantsMedian']);
