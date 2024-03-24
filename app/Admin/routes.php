<?php

use App\Admin\Controllers\CategoryController;
use App\Admin\Controllers\MemberShipFeeController;
use App\Admin\Controllers\RestaurantController;
use App\Admin\Controllers\UserController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('categories', CategoryController::class);
    $router->resource('restaurants', RestaurantController::class);
    $router->resource('users', UserController::class);
    $router->resource('member-ship-fees', MemberShipFeeController::class)->only('index');
});
