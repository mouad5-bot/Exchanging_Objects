<?php


use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\User;



Auth::routes();

// -------------------------- main Home ----------------------//
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/home', 'index')->name('home');
    // Route::get('/users/profile', 'profile')->name('profile');   
});

// -------------------------- User | Profile ----------------------//
Route::get('users/profile/{user}', [UserController::class , 'show'])->name('users/profile');
Route::post('users/profile/update', [UserController::class, 'update'])->name('users/profile/update');
Route::post('users/profile/updatePassword',[UserController::class, 'updatePassword'])->name('changePassword');

// -------------------------- Products ----------------------//
Route::resource('products', ProductController::class);

// -------------------------- About us ----------------------//
Route::get('aboutus/about', function () {
    return view('aboutus.about');
})->name('aboutus.about');

// -------------------------- main dashboard ----------------------//
Route::controller(HomeController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard'); 
});
