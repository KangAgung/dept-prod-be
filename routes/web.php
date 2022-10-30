<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return 'Dept. Prod BE Service - '.$router->app->version();
});

$router->group(['prefix' => 'sales'], function () use ($router){
    $router->get('/', 'SalesController@index');
    $router->post('/', 'SalesController@store');
});

$router->group(['prefix' => 'barang'], function () use ($router){
    $router->get('/', 'BarangController@index');
});

$router->group(['prefix' => 'customer'], function () use ($router){
    $router->get('/', 'CustomerController@index');
});
