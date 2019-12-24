<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('user-management', UserController::class);
    $router->resource('user-roles', UserRoleController::class);
    $router->resource('pasien', DokterController::class);
    $router->resource('zona', ZonaController::class);
});
