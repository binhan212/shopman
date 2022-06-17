<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\api\apidmlcontroller;

Route::get('/admin/dml', function () {
    return view('admin.dml');
});
Route::get('/admin/dmc', function () {
    return view('admin.dmc');
});
Route::get('/admin/sanpham', function () {
    return view('admin.sanpham');
});
Route::get('/admin/mausac', function () {
    return view('admin.mausac');
});
Route::get('/admin/size', function () {
    return view('admin.size');
});
Route::get('/admin/donhang', function () {
    return view('admin.donhang');
});
Route::get('/admin/ctdh', function () {
    return view('admin.ctdh');
});
Route::get('/admin/ttdh', function () {
    return view('admin.ttdh');
});
Route::get('/admin/khachhang', function () {
    return view('admin.khachhang');
});
Route::get('/admin/ad', function () {
    return view('admin.ad');
});
Route::get('/admin/thongke', function () {
    return view('admin.thongke');
});

Route::get('/trangchu/cart', function () {
    return view('trangchu.cart');
});

Route::get('/admin', function () {
    return view('admin.dangnhap');
});

Route::get('/', function () {
    return view('_layout_index');
});
Route::get('/dangnhap', function () {
    return view('trangchu.dangnhap');
});


Route::get('/dangky', function () {
    return view('trangchu.dangky');
});

Route::get('/detail', function () {
    return view('trangchu.detail');
});

Route::get('/trangchu/detailpay', function () {
    return view('trangchu.detailpay');
});

Route::get('/trangchu/info', function () {
    return view('trangchu.infomation');
});
Route::get('/trangchu/shop', function () {
    return view('trangchu.shop');
});

Route::get('/trangchu/search', function () {
    return view('trangchu.search');
});

Route::get('/trangchu/detailShop', function () {
    return view('trangchu.detailShop');
});

Route::get('/trangchu/indoc', function () {
    return view('trangchu.indoc');
});

Route::get('/trangchu/tintuc', function () {
    return view('trangchu.tintuc');
});

use App\Http\Controllers\trangchucontroller;
Route::get('/',[trangchucontroller::class,'index']);


use App\Http\Controllers\api\filescontroller;
Route::post('/file', [filescontroller::class, 'addFiles']);
        Route::delete('/file', [filescontroller::class, 'deleteFiles']);
