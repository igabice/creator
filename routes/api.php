<?php
//
//use Illuminate\Http\Request;
//
///*
//|--------------------------------------------------------------------------
//| API Routes
//|--------------------------------------------------------------------------
//*/
//
//
////$api->post('login', 'AuthController@login');
//
//
//$api = app('Dingo\Api\Routing\Router');
//
////"laracasts/generators": "dev-master",
//
//  //      "dingo/api": "2.0.0-alpha1",
//
//$api->version('v1', ['version' => 'v1', 'prefix' => 'api'], function ($api) {
//
//
//
//    //FARMERS
//    $api->get('/me', 'App\Http\Controllers\Api\FarmersController@index');
//    $api->post('/laws', 'App\Http\Controllers\Api\FarmersController@store');
//    $api->post('/edit-farmer', 'App\Http\Controllers\Api\FarmersController@update');
//    //PRODUCTS
//    $api->get('/products', 'App\Http\Controllers\Api\ProductsController@index');
//    $api->post('/farm-Withdrawal', 'App\Http\Controllers\Api\ProductsController@farmProducts');// farm_id
//    $api->post('/products', 'App\Http\Controllers\Api\ProductsController@store');
//    $api->get('/edit-products', 'App\Http\Controllers\Api\ProductsController@update');
//
//
//    //ORDERS
//    $api->get('/orders', 'App\Http\Controllers\Api\OrdersController@index');
//    $api->post('/my-orders', 'App\Http\Controllers\Api\OrdersController@mySales');// farm_id
//    $api->post('/orders', 'App\Http\Controllers\Api\OrdersController@store');
//    //$api->get('hide-orders/{id}', 'App\Http\Controllers\Api\ShowsController@hideShow');
//
//
//    //AUTH
//    $api->post('auth/login', 'App\Http\Controllers\AuthController@login');
//    $api->post('auth/signup', 'App\Http\Controllers\AuthController@signup');
//
//    $api->group(['namespace' => 'App\Api\Controllers','middleware'=>'jwt.auth'],function ($api){
//        $api->post('/photo/change', 'UserController@photo');
//    });
//
//});
//"dingo/api":  "^2.1","laracasts/generators": "dev-master",
