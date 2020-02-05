<?php

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
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function ($router) {
    $router->group(['prefix' => 'posts', 'middleware' => ['auth']], function ($router) {
        $router->get('/', 'PostController@index');
        $router->get('{id}', 'PostController@show');
        $router->post('/', 'PostController@store');
        $router->put('{id}', 'PostController@update');
        $router->delete('{id}', 'PostController@destroy');
    });

    $router->group(['prefix' => 'auth'], function ($router) {
        $router->get('/', 'AuthController@me');
        $router->post('login', 'AuthController@login');
        $router->post('logout', 'AuthController@logout');
        $router->post('refresh', 'AuthController@refresh');
    });
});
