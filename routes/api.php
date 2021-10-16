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
Route::get('/kpi/transactions', [KPIController::class, 'GetTransactions']);
Route::get('/kpi/users', [KPIController::class, 'GetUsersCount']);
Route::get('/kpi/products/{interval}', [KPIController::class, 'GetProductsCountByInterval']);
Route::get('/kpi/merchants/:from/:to', [KPIController::class, 'GetMerchants']);

Route::get('/kpi/sellers/new', [KPIController::class, 'GetNewSellers']);

Route::get('/kpi/sellers/:from/:to', [KPIController::class, 'GetUniqueSellers']);
Route::get('/kpi/merchants/median', [KPIController::class, 'GetMerchantsMedian']);
