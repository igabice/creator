<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;


//URL::forceScheme('https');

Auth::routes(['verify' => true]);
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.token');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


//Route::get('/register', 'Admin\ShowsController@register')->name('register');


Route::get('/', 'HomeController@soon')->name('coming-soon');
Route::post('/signup', 'HomeController@registerUser')->name('registerUser');
Route::get('/refer-product/{id}', 'ProductsController@referProduct')->name('create-update');


Route::get('/register', 'HomeController@register')->name('register');

Route::post('/newsletter', 'GlobalAdminController@newsletter')->name('blog');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/about', 'HomeController@about')->name('about');

Route::get('/courses', 'ProductsController@index')->name('courses');

Route::middleware('auth')->group(function(){
    Route::get('/account', 'HomeController@account')->name('account');

    Route::post('/pay', 'FlutterwaveController@initialize')->name('pay');
// The callback url after a payment
// The callback url after a payment
    Route::get('/rave/callback', 'FlutterwaveController@callback')->name('callback');
    Route::get('/rave/callback2', 'FlutterwaveController@callback2')->name('callback');
// The callback url after a course payment
    Route::post('/buy-course', 'FlutterwaveController@buyCourse')->name('buyCourse');
    Route::get('/rave/course-bought', 'FlutterwaveController@courseBought')->name('courseBought');




//Route::get('/', 'HomeController@homepage')->name('homepage');
Route::get('/home', 'HomeController@soon')->name('home');//->middleware('verified');;
Route::get('/affiliate-assets', 'HomeController@assets')->name('home');

Route::get('/marketers', 'UserController@allMarketers')->name('marketers');
Route::get('/creators', 'UserController@allCreators')->name('creators');
Route::get('/referrals', 'UserController@referrals')->name('referrals');
Route::get('/fix-wallet', 'UserController@fixWallet')->name('fixWallet');


//Users
Route::resource('users', 'UserController');
Route::post('/users-update', 'UserController@update')->name('user-update');
Route::get('/create-user', 'UserController@createform')->name('create-user');
Route::get('/my-payments-details', 'UserController@myPaymentDetails')->name('myPaymentDetails');
Route::post('/account-update', 'UserController@updateAccount')->name('updateAccount');

Route::get('/my-payouts', 'UserController@payouts')->name('payouts');
Route::get('/all-payouts', 'UserController@allPayouts')->name('all-payouts');
Route::post('//topup-wallet', 'UserController@updateWallet')->name('topup-wallet');
Route::post('/approve-payout', 'UserController@approvePayouts')->name('approve-payouts');
Route::post('/request-payouts', 'UserController@requestPayouts')->name('requestPayouts')->middleware('verified');
//Products
Route::resource('products', 'ProductsController');
Route::get('/video-delete/{id}', 'ProductsController@deleteVideo')->name('video-delete');
Route::post('/video-add', 'ProductsController@saveVideo')->name('video-save');
Route::post('/video-edit', 'ProductsController@editVideo')->name('video-edit');

Route::post('/products-update', 'ProductsController@update')->name('state-update');
Route::get('/create-product', 'ProductsController@createform')->name('create-update');

Route::get('/strategy', 'ProductsController@strategy')->name('strategy');
Route::post('/campaign', 'ProductsController@newCampaign')->name('new-campaigns');

//Carts
Route::resource('cart', 'CartsController');
Route::post('/cart-update', 'CartsController@update')->name('cart-update');

Route::get('/cart-delete/{id}', 'CartsController@deleteProduct')->name('deleteProduct');
Route::get('/cartt', 'HomeController@cartt')->name('cartt');

Route::get('/campaigns', 'CartsController@campaigns')->name('campaigns');
Route::post('/campaign', 'CartsController@newCampaign')->name('new-campaigns');


//Products
Route::resource('posts', 'PostsController');
Route::post('/posts-update', 'PostsController@update')->name('post-update');
Route::get('/create-post', 'PostsController@createform')->name('create-post');


Route::get('/admin', 'HomeController@admin')->name('admin');
Route::get('/choose-state', 'HomeController@states')->name('choose-states');
Route::get('/categories', 'HomeController@categories')->name('choose-categories');
Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
Route::get('/dashboard-chapters', 'DashboardController@chapters')->name('dashboard-chapters');
Route::get('/dashboard-details', 'DashboardController@details')->name('dashboard-chapters');
Route::get('/blog', 'DashboardController@blogs')->name('blogs');


//Imports
Route::post('/upload-laws', 'ImportController@uploadLaw')->name('upload-law');
Route::post('/upload-sections', 'ImportController@importSection')->name('upload-sections');


//payment
//    Route::post('/pasy', 'PaymentController@redirectToGateway')->name('pasy');
//    Route::get('/pay-info', 'PaymentController@handleGatewayCallback')->name('pay-info');
    Route::get('/marketing-resources', 'PaymentController@marketResources')->name('marketResources');

Route::get('/profile', 'UserController@profile')->name('profile');
Route::get('/approve/{id}', 'UserController@verify')->name('verify'); 
Route::get('/approve-kyc/{id}', 'UserController@verifyKyc')->name('verifyKyc'); 
Route::post('/profile', 'UserController@updateProfile')->name('profile-update');
Route::post('/id-card', 'UserController@idCard')->name('profile-id');

Route::get('/users/edit/{id}/{type?}', 'UserController@edit')->name('cro_edit')->middleware(['auth', 'checkcro']);
Route::patch('/users/update/{id?}', ['as' => 'user.update', 'uses' => 'UserController@update']);

Route::get('/sendmail', 'HomeController@sendmail')->name('sendmail');

    Route::get('/clear-cache', function() {
        $exitCode = Artisan::call('cache:clear');
        // return what you want
    });

    Route::get('/config-cache', function() {
        $exitCode = Artisan::call('config:cache');
        // return what you want
    });

});
