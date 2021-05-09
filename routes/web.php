<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('create', function () {
    return view('createprod');
});
Route::post('store', function (Request $request) {
    $products = DB::table('products')->insert([
        'Product_name' => $request->Product_name , 'Product_price' => $request->Product_price
        , 'Product_quantity' => $request->Product_quantity
        ]);

    return redirect() ->back();
});
Route::get('show', function () {
    $products = DB::table('products')->get();
    return view('allproduct');
});
Route::post('/{id}' , function($id){
    $affected = DB::table('products')
    ->where('id', $id)
    ->update([$id]);
    return view('allproduct');
});
Route::post('/{id}' , function($id){
    DB::table('products')->delete();
    DB::table('products')->where($id)->delete();
    return view('allproduct');
});

Route::get('name', function () {
    return view('nameform');
});
