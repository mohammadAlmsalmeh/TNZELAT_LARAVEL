<?php

use App\Http\Controllers\admin\cardController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\phoneCategController;
use App\Http\Controllers\admin\phoneController;
use App\Http\Controllers\admin\userController;
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
    //category crud
    Route::prefix("category")->group(function (){
        Route::get("/",[categoryController::class,"categoryFun"]);
        Route::post("/",[categoryController::class,"createCategory"])->name("createCategory");
        Route::put("/",[categoryController::class,"editCategory"])->name("editCategory");
        Route::delete("/",[categoryController::class,"deleteCategory"])->name("deleteCategory");
    });
    //cards crud
    Route::prefix("cards")->group(function (){
        Route::get("/",[cardController::class,"cardsFun"]);
        Route::post("/",[cardController::class,"createCard"])->name("createCard");
        Route::put("/",[cardController::class."editCard"])->name("editCard");
        Route::delete("/",[cardController::class,"deleteCard"])->name("deleteCard");
    });
    //phone crud
    Route::prefix("phone")->group(function (){
        Route::get("/",[phoneController::class,"phoneFun"]);
        Route::post("/",[phoneController::class,"createPhone"])->name("createPhone");
        Route::put("/",[phoneController::class,"editPhone"])->name("editPhone");
        Route::delete("/",[phoneController::class,"deletePhone"])->name("deletePhone");
    });
    // phone category crud
    Route::prefix("phoneCategory")->group(function (){
        Route::get("/",[phoneCategController::class,"phoneCategFun"]);
        Route::post("/",[phoneCategController::class,"createPCateg"])->name("createPCateg");
        Route::put("/",[phoneCategController::class,"editPCateg"])->name("editPCateg");
        Route::delete("/",[phoneCategController::class,"deletePCateg"])->name("deletePCateg");
    });
    // users crud
    Route::prefix("users")->group(function (){
        Route::get("/",[userController::class,"userFun"]);
        Route::post("/",[userController::class,"createUser"])->name("createUser");
        Route::put("/",[userController::class,"editUser"])->name("editUser");
        Route::delete("/",[userController::class,"deleteUser"])->name("deleteUser");
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
