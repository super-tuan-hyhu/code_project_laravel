<?php

use App\Http\Controllers\Client\AuthenClientController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductDetailController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Dashboard\AddressController;
use App\Http\Controllers\Dashboard\AuthenController;
use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ColorController;
use App\Http\Controllers\Dashboard\CounterController;
use App\Http\Controllers\Dashboard\CouponController;
use App\Http\Controllers\Dashboard\ImageController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Client\ClientOrderController;
use App\Http\Controllers\Dashboard\PersonnelController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ReturnOrderController;
use App\Http\Controllers\Dashboard\ShipmentController;
use App\Http\Controllers\Dashboard\SizeController;
use App\Http\Controllers\Dashboard\StatisticController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([
    'prefix' => 'client',
    'as' => 'client.'
], function (){
    Route::get('login', [AuthenClientController::class, 'login'])->name('login');
    Route::post('login', [AuthenClientController::class, 'signIn'])->name('signIn');
    Route::get('logout', [AuthenClientController::class, 'logout'])->name('logout');
});


Route::group([
    'prefix' => 'client',
    'as' => 'client.',
], function (){

    Route::group([
        'prefix' => 'home',
        'as' => 'home'
    ], function (){
        Route::get('/', [HomeController::class, 'index'])->name('index');
    });

    Route::group([
        'prefix' => 'detail',
        'as' => 'detail.',
    ], function (){
        Route::get('product-detail/{id}/color/{id_color}', [ProductDetailController::class, 'index'])->name('index');
        Route::post('comment', [ProductDetailController::class, 'postComment'])->name('postComment');
    });

    Route::group([
        'prefix' => 'cart',
        'as' => 'cart.',
    ], function (){
        Route::post('cart/{id}', [CartController::class, 'postCart'])->name('postCart');
        Route::get('cart-Detail', [CartController::class, 'cartDetail'])->name('cartDetail');
        Route::delete('delete/{id}', [CartController::class, 'deleteCart'])->name('deleteCart');
        Route::post('update/{id}', [CartController::class, 'updateCart'])->name('updateCart');
    });

    Route::group([
        'prefix' => 'order',
        'as' => 'order.'
    ], function (){
        Route::get('check-out', [ClientOrderController::class, 'index'])->name('index');
        Route::post('confirm', [ClientOrderController::class, 'confirm'])->name('confirm');
        Route::get('coupon', [ClientOrderController::class, 'coupon'])->name('coupon');
    });

    Route::group([
        'prefix' => 'profile',
        'as' => 'profile.'
    ], function (){
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::put('update/{id}', [ProfileController::class, 'update'])->name('update');
        Route::put('changePass', [ProfileController::class, 'changePass'])->name('changePass');
        Route::put('changeAddress/{id}', [ProfileController::class, 'changeAddress'])->name('changeAddress');
    });
});

// Dashboard Super Admin
Route::group([
    'prefix' => 'super',
    'as' => 'super.',
], function (){
    Route::get('login', [AuthenController::class, 'login'])->name('login');
    Route::get('logout', [AuthenController::class, 'logout'])->name('logout');
    Route::post('login', [AuthenController::class, 'postLogin'])->name('postLogin');
});


Route::group([
    'prefix' => 'dashboard',
    'as' => 'dashboard.',
    'middleware' => 'checkSuperAdmin',
], function(){
    // statistic
    Route::group([
        'prefix' => 'statistic',
        'as' => 'statistic.',
    ], function () {
        Route::get('/', [StatisticController::class, 'index'])->name('index');
    });
    //end statistic

    Route::group([
        'prefix' => 'category',
        'as' => 'category.'
    ], function(){
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('create', [CategoryController::class, 'create'])->name('create');
        Route::post('create', [CategoryController::class, 'store'])->name('store');
        //update
        Route::get('update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::put('update/{id}', [CategoryController::class, 'edit'])->name('edit');
        // Delete
        Route::delete('delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    });

    //Brand
    Route::group([
        'prefix' => 'brand',
        'as' => 'brand.',
    ], function (){
        Route::get('/', [BrandController::class, 'index'])->name('index');
        // create
        Route::get('create', [BrandController::class, 'create'])->name('create');
        Route::post('create', [BrandController::class, 'store'])->name('store');

        // update
        Route::get('update/{id}', [BrandController::class, 'update'])->name('update');
        Route::put('update/{id}', [BrandController::class, 'edit'])->name('edit');
        // delete
        Route::delete('delete/{id}', [BrandController::class, 'delete'])->name('delete');
    });

    // products
    Route::group([
        'prefix' => 'products',
        'as' => 'products.',
    ], function (){
        Route::get('/', [ProductController::class, 'index'])->name('index');
        // create product
        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::post('create', [ProductController::class, 'store'])->name('store');

        // update
        Route::get('update/{id}', [ProductController::class, 'update'])->name('update');
        Route::put('update/{id}', [ProductController::class, 'edit'])->name('edit');

        // delete
        Route::delete('delete/{id}', [ProductController::class, 'delete'])->name('delete');
    });

    // Color
    Route::group([
        'prefix' => 'products/{id}/color',
        'as' => 'products.color.',
    ], function (){
        Route::get('/', [ColorController::class, 'index'])->name('index');
        Route::post('create', [ColorController::class, 'create'])->name('create');
        Route::put('update', [ColorController::class, 'update'])->name('update');
        Route::get('delete/{id_color}', [ColorController::class, 'delete'])->name('delete');
    });

    // Size

    Route::group([
        'prefix' => 'products/{id}/size',
        'as' => 'products.size.',
    ], function (){
        Route::get('/', [SizeController::class, 'index'])->name('index');
        Route::post('create', [SizeController::class, 'create'])->name('create');
        Route::put('update', [SizeController::class, 'update'])->name('update');
        Route::get('delete/{id_size}', [SizeController::class, 'delete'])->name('delete');
    });


//     Image
    Route::group([
        'prefix' => 'products/{id}/image',
        'as' => 'products.image.'
    ], function (){
        Route::get('/', [ImageController::class, 'index'])->name('index');
        Route::get('create/{id_color}', [ImageController::class, 'create'])->name('create');
        Route::post('create', [ImageController::class, 'store'])->name('store');

        // update image
        Route::put('update/{id_image}', [ImageController::class, 'update'])->name('update');
        // delete
        Route::delete('delete/{id_image}', [ImageController::class, 'delete'])->name('delete');
    });

    // Coupon

    Route::group([
        'prefix' => 'coupon',
        'as' => 'coupon.'
    ], function (){
        Route::get('/', [CouponController::class, 'index'])->name('index');
        // create coupon
        Route::get('create', [CouponController::class, 'create'])->name('create');
        Route::post('create', [CouponController::class, 'store'])->name('store');

        // update Coupon
        Route::get('update/{id}', [CouponController::class, 'update'])->name('update');
        Route::put('update/{id}', [CouponController::class, 'edit'])->name('edit');

        // delete
        Route::delete('delete/{id}', [CouponController::class , 'delete'])->name('delete');
    });


    // Personnel
    Route::group([
        'prefix' => 'personnel',
        'as' => 'personnel.'
    ], function (){
        Route::get('/', [PersonnelController::class, 'index'])->name('index');
        // Personnel Quit
        Route::get('restore', [PersonnelController::class, 'personnelQuit'])->name('personnelQuit');
        Route::put('restore/{id}', [PersonnelController::class, 'restore'])->name('restore');

        // create personnel
        Route::get('create', [PersonnelController::class, 'create'])->name('create');
        Route::post('create', [PersonnelController::class, 'store'])->name('store');

        // update personnel
        Route::get('update/{id}', [PersonnelController::class, 'update'])->name('update');
        Route::put('update/{id}', [PersonnelController::class, 'edit'])->name('edit');

        // delete
        Route::delete('delete/{id}', [PersonnelController::class, 'delete'])->name('delete');
    });

    // users
    Route::group([
        'prefix' => 'user',
        'as' => 'user.'
    ],
        function (){
        Route::get('/', [UserController::class, 'index'])->name('index');

        // create Users
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('create', [UserController::class, 'store'])->name('store');

        // Update User
        Route::get('update/{id}', [UserController::class, 'update'])->name('update');
        Route::put('update/{id}', [UserController::class, 'edit'])->name('edit');

        // delete User
        Route::delete('delete/{id}', [UserController::class, 'delete'])->name('delete');

        // Client spam
        Route::get('client', [UserController::class, 'client'])->name('client');
        Route::put('client/{id}', [UserController::class, 'restore'])->name('restore');
    });

    // address users
    Route::group([
        'prefix' => 'user/{id}/address',
        'as' => 'user.address',
    ], function (){
        Route::get('/', [AddressController::class, 'index'])->name('index');
        Route::post('create', [AddressController::class, 'store'])->name('store');

        // update
        Route::put('update/{id_address}', [AddressController::class, 'edit'])->name('edit');
        // Delete
        Route::delete('delete/{id_address}', [AddressController::class, 'destroy'])->name('destroy');
    });

    // Counter
    Route::group([
        'prefix' => 'counter',
        'as' => 'counter.'
    ], function (){
        Route::get('/', [CounterController::class, 'index'])->name('index');
        // add products Counter
        Route::post('add/{id}', [CounterController::class, 'add'])->name('add');

        // update cart
        Route::get('update', [CounterController::class, 'update'])->name('update');

        // delete
        Route::get('delete', [CounterController::class, 'delete'])->name('delete');
        // delete all
        Route::get('destroy', [CounterController::class, 'destroy'])->name('destroy');

        // add user counter
        Route::get('user/{id}', [CounterController::class, 'getUser'])->name('getUser');

        // coupon
        Route::get('coupon', [CounterController::class, 'coupon'])->name('coupon');
        // driver
        Route::get('updateTotal', [CounterController::class, 'updateTotal'])->name('updateTotal');

    });

    Route::group([
        'prefix' => 'order',
        'as' => 'order.'
    ], function (){
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('orderDetail/{id}', [OrderController::class, 'detail'])->name('detail');
        Route::post('create', [OrderController::class, 'create'])->name('create');
    });

    Route::group([
        'prefix' => 'shipment',
        'as' => 'shipment.',
    ], function (){
        Route::put('update/{id}', [ShipmentController::class, 'updateShip'])->name('updateShip');
        Route::put('cancel/{id}', [ShipmentController::class, 'cancelShip'])->name('cancelShip');
    });

    Route::group([
        'prefix' => "cancel_order",
        'as' => 'cancel_order.'
    ], function (){
        Route::get('/', [ReturnOrderController::class, 'index'])->name('index');
        Route::get('showCancel/{id}', [ReturnOrderController::class, 'showCancel'])->name('showCancel');
        Route::post('return-order/{id}', [ReturnOrderController::class, 'returnOrder'])->name('returnOrder');
    });

});
