<?php


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\productFilterController;
use Illuminate\Support\Facades\Route;


Auth::routes();

// -------------------------- main Home ----------------------//
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/home', 'index')->name('home'); 
    Route::get('filter', 'FilterProduct'); 
    Route::get('search', 'searchProduct'); 
});

// -------------------------- User | Profile ----------------------//
Route::get('users/profile/{user}', [UserController::class , 'show'])->name('users/profile');
Route::post('users/profile/update', [UserController::class, 'update'])->name('users/profile/update');
Route::post('users/profile/updatePassword',[UserController::class, 'updatePassword'])->name('changePassword');
Route::post('users/profile/deleteProfile/{id}',[UserController::class, 'deleteProfile'])->name('deleteProfile');

// -------------------------- Products ----------------------//
Route::resource('products', ProductController::class);
Route::get('exchange/{product_id}', [ProductController::class, 'exchange'])->name('exchange');
Route::post('confermExchanging/{product_id}', [ProductController::class, 'exchange'])->name('confermExchanging');

// -------------------------- Categories --------------------//
Route::resource('category', CategoryController::class);


// -------------------------- About us ----------------------//
Route::get('aboutus/about', function () {
    return view('aboutus.about');
})->name('aboutus.about');

// -------------------------- Chat fonctionnality ----------------------//
Route::controller(App\Http\Controllers\ChatifyController::class)->group(function () {
    Route::get('/chatify/{user_id}', 'index')->name('chatify');
});


// -------------------------- main dashboard ----------------------//
    Route::get('dashboard/index', [DashboardController::class , 'show'])->name('dashboard.index');


// -------------------------- Filter Products ----------------------//
// Route::get('/', [productFilterController::class, 'filter'])->name('products.filter');


