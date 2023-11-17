<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\ChangeInfoController;
use App\Http\Controllers\RegisterController;
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
//trang chủ
Route::group(['prefix' => '/homepage', 'middleware' => 'CheckLogedOut'], function (){
    Route::get('', [FrontendController::class, 'getHome']);
});

//Đăng ký
Route::get('/register', [RegisterController::class, 'getRegister']);
Route::post('/register', [RegisterController::class, 'postRegister']);

// changeinfo
Route::group(['prefix' => 'change-info','middleware' => 'CheckLogedOut'], function (){
    Route::get('/', [ChangeInfoController::class, 'getChangeInfo']);
    Route::post('/', [ChangeInfoController::class, 'updateInfo']);
});


// lấy ra chi tiết sản phẩm và comment
Route::get('/detail/{id}', [FrontendController::class, 'getDetail']);
Route::post('/detail/{id}', [FrontendController::class, 'postComment']);

// lấy ra các danh mục
Route::get('/category/{id}', [FrontendController::class, 'getCategory']);

//search
Route::get('/search', [FrontendController::class, 'getSearch']);

// giỏ hàng
Route::group(['prefix' => 'cart'], function (){
    Route::get('/add/{id}', [CartController::class, 'getAddCart']);
    Route::get('/show', [CartController::class, 'getShowCart']);
    Route::get('/delete/{id}', [CartController::class, 'getDeleteCart']);
    Route::get('/update', [CartController::class, 'getUpdateCart']);
    Route::post('/show', [CartController::class, 'postPayCart']);

});

//hoàn thành
Route::get('/complete', [CartController::class, 'getComplete']);


// Admin
Route::group(['namespace' => 'Admin'], function () {
    //login
    Route::group(['prefix' => '/', 'middleware' => 'CheckLogedIn'], function (){
       Route::get('/', [LoginController::class, 'getLogin']);
       Route::post('/', [LoginController::class, 'postLogin']);
    });

    //logout
    Route::get('/logout', [HomeController::class, 'getLogout']);

    //admin
    Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogedOut'], function (){

        //admin page
        Route::get('/home', [HomeController::class, 'getHome']);

        //category
        Route::group(['prefix' => 'category'], function (){
            Route::get('/', [CategoryController::class, 'getCategory']);

            Route::post('/', [CategoryController::class, 'postCreateCategory']);

            Route::get('/edit/{id}', [CategoryController::class, 'getEditCategory']);
            Route::post('/edit/{id}', [CategoryController::class, 'putUpdateCategory']);

            Route::get('/delete/{id}', [CategoryController::class, 'getDeleteCategory']);
        });

        //product
        Route::group(['prefix' => 'product'], function (){
            Route::get('/', [ProductController::class, 'getProduct']);


            Route::get('/create', [ProductController::class, 'getCreateProduct']);
            Route::post('/create', [ProductController::class, 'postCreateProduct']);

            Route::get('/edit/{id}', [ProductController::class, 'getEditProduct']);
            Route::post('/edit/{id}', [ProductController::class, 'putUpdateProduct']);

            Route::get('/delete/{id}', [ProductController::class, 'getDeleteProduct']);
        });

         //statistics
         Route::group(['prefix' => 'statistic'], function (){
            Route::get('/', [StatisticController::class, 'getStatistic'] );
        });

        //order
        Route::group(['prefix' => 'order'], function (){
            Route::get('/', [OrderController::class, 'getOrder']);
            Route::get('/delete/{id}', [OrderController::class, 'getDeleteOrder']);
            Route::get('/confirm/{id}', [OrderController::class, 'confirmOrder']);
        });

        //account
        Route::group(['prefix' => 'account'], function (){
            Route::get('/', [AccountController::class, 'getAccount']);
            Route::get('/delete/{id}', [AccountController::class, 'getDeleteAccount']);
        });
    });
});
