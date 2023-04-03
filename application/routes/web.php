<?php


use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\User;




// Route::controller(HomeController::class)->group(function () {
//     Route::get('/', 'index')->name('home');
//     Route::get('/home', 'index')->name('home');
// });


Route::get('users/profile/{user}', [UserController::class , 'show'])->name('users/profile');
Route::get('users/profile/update', [UserController::class, 'update'])->name('users/profile/update');
Route::post('users/profile/update', [UserController::class, 'update'])->name('users/profile/update');


Route::resource('products', ProductController::class);

Route::get('aboutus/about', function () {
    return view('aboutus.about');
})->name('aboutus.about');



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
