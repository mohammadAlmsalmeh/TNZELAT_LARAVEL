<?php

use App\Http\Controllers\adminController;
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
    return view('index');
});
Route::prefix("admin")->middleware("adminAuth")->group(function (){
    Route::get("/category",[adminController::class,"categoryFun"]);
    Route::get("/cards",[adminController::class,"cardsFun"]);
    Route::get("/phone",[adminController::class,"phoneFun"]);
    Route::get("/phoneCategory",[adminController::class,"phoneCategFun"]);
    Route::get("/users",[adminController::class,"userFun"]);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
