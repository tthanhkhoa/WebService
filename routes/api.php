<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/danhsachtheloai_api', 'Admin\TheLoaiController@getTheLoai_api')->name('danhsachtheloai_api');
Route::get('/danhsachncc_api', 'Admin\TheLoaiController@getNhanHieu')->name('danhsachncc_api');
Route::post('/addsanpham_api', 'Admin\SanPhamController@addSanPham')->name('addsanpham_api');
