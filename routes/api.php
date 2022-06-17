<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\api\apidmlcontroller;
use App\Http\Controllers\api\apidmccontroller;
use App\Http\Controllers\api\apisanphamcontroller;
use App\Http\Controllers\api\apimausaccontroller;
use App\Http\Controllers\api\apisizecontroller;
use App\Http\Controllers\api\apidonhangcontroller;
use App\Http\Controllers\api\apictdhcontroller;
use App\Http\Controllers\api\apittdhcontroller;
use App\Http\Controllers\api\apikhachhangcontroller;
use App\Http\Controllers\api\apiadcontroller;
use App\Http\Controllers\api\apitrangchucontroller;
use App\Http\Controllers\api\apicartcontroller;

Route::get('/getdh/{id}',[apidonhangcontroller::class,'getdonhang']);

Route::post('/editkh/{id}',[apikhachhangcontroller::class,'editkh']);

Route::post('/themdonhang',[apidonhangcontroller::class,'themdonhang']);

Route::get('/getDHAllInfo/{id}',[apidonhangcontroller::class,'getDHAllInfo']);


Route::get('/getdmc/{id}',[apidmccontroller::class,'getdmc']);

Route::get('/getSpDmc/{id}',[apisanphamcontroller::class,'getSpDmc']);

Route::get('/getSpDmcDetail/{id}',[apisanphamcontroller::class,'getSpDmcDetail']);

Route::get('/getSPwithSize/{id}',[apisizecontroller::class,'getSPwithSize']);



Route::get('/search/{id}',[apisanphamcontroller::class,'search']);



Route::resource('dml', apidmlcontroller::class);
Route::resource('dmc', apidmccontroller::class);
Route::resource('sanpham',apisanphamcontroller::class);
Route::resource('mausac',apimausaccontroller::class);
Route::resource('size', apisizecontroller::class);
Route::resource('donhang', apidonhangcontroller::class);
Route::resource('ctdh', apictdhcontroller::class);
Route::resource('ttdh', apittdhcontroller::class);
Route::resource('khachhang', apikhachhangcontroller::class);
Route::resource('ad', apiadcontroller::class);
Route::resource('cart', apicartcontroller::class);
Route::resource('trangchu', apitrangchucontroller::class);


use App\Http\Controllers\api\apidangnhapcontroller;
Route::resource('dangnhap', apidangnhapcontroller::class);


// Route::post('dangnhaptc', apidangnhapcontroller::class,"dangnhaptc");

use App\Http\Controllers\api\apidangnhaptccontroller;
Route::resource('dangnhaptc', apidangnhaptccontroller::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});