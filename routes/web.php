<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

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

Auth::routes(['verify' => true]);

Route::get('/', [RestaurantController::class, 'index'])->name('restaurants.index');

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/reviews/register', [ReviewController::class, 'store'])->name('reviews.register');
Route::post('/reviews/register', [ReviewController::class, 'store'])->name('reviews.register');

Route::get('/restaurants/{restaurant}', [RestaurantController::class, 'detail'])->name('restaurants.detail');

Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::get('/reservations/subscription', [ReservationController::class, 'create'])->name('subscription');
Route::post('/reservations/register', [ReservationController::class, 'store'])->name('reservations.register');
Route::get('restaurants/{restaurant}/favorite', [RestaurantController::class, 'favorite'])->name('restaurants.favorite');
Route::get('restaurants/{restaurant}/unfavorite', [RestaurantController::class, 'unfavorite'])->name('restaurants.unfavorite');

Route::controller(UserController::class)->group(function () {
  Route::get('users/mypage', 'mypage')->name('mypage');
  Route::get('users/mypage/edit', 'edit')->name('mypage.edit');
  Route::put('users/mypage', 'update')->name('mypage.update');
  Route::get('users/mypage/favorite', 'favorite')->name('mypage.favorite');
  Route::delete('users/mypage/delete', 'destroy')->name('mypage.destroy');
});

Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');

Route::controller(CheckoutController::class)->group(function () {
  Route::get('checkout', 'index')->name('checkout.index');
  Route::post('checkout', 'store')->name('checkout.store');
  Route::get('checkout/success', 'success')->name('checkout.success');
});
