<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;


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

Route::get('/', [HomeController::class, 'home']);
// Route::post('/search', [HomeController::class, 'search']);
Route::get('/signup', [SignupController::class, 'signupview']);
Route::post('/signup', [SignupController::class, 'signup']);

/* /////////LOGIN//////////////LOGIN///////////////LOGIN///////////// */

Route::get('/login', [LoginController::class, 'loginview']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LogoutController::class, 'logout']);

/* ///////////ADMIN/////////////ADMIN/////////////////ADMIN/////////// */

Route::group(['middleware'=>'admin'], function(){

    Route::get('/admin', [LoginController::class, 'adminview']);
    Route::get('/admin', [AdminController::class, 'adminview']);
    Route::get('/users', [AdminController::class, 'users']);
    Route::get('/edit', [AdminController::class, 'editview']);
    Route::post('/edit', [AdminController::class, 'edit']);
    Route::get('/deactivate/{id?}', [AdminController::class, 'deactivate']);
    Route::get('/activate/{id?}', [AdminController::class, 'activate']);
    Route::get('/addproduct', [AdminController::class, 'addproductview']);
    Route::post('/addproduct', [AdminController::class, 'addproduct']);
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('inventory', [AdminController::class, 'inventory']);
    Route::get('/removeproduct/{id?}', [AdminController::class, 'removeproduct']);
});

/* ///////////USER//////////////USER/////////////////USER/////////// */
Route::group(['middleware'=>'user'], function(){
    Route::get('/profile', [UserController::class, 'profile']);
    Route::get('/invoice', [UserController::class, 'invoice']);
    Route::get('/mypurchases', [UserController::class, 'mypurchases']);
    Route::post('/mypurchases', [UserController::class, 'getpurchases']);
    Route::get('/rewards', [UserController::class, 'rewards']);
});

/* /////////ERRORS///////////////ERRORS////////////////ERRORS//////////// */

Route::view('/derror', 'derror');
Route::view('/error', 'error');

/* /////////SEND MAIL///////////////SEND MAIL////////////////SEND MAIL//////////// */

Route::get('/sendmail',[MailController::class, 'sendmail']);

/* /////////PRODUCT///////////////PRODUCT////////////////PRODUCT//////////// */


Route::get('/product', [ProductController::class, 'product']);
Route::get('/productdetails/{id?}',[ProductController::class, 'productdetails']);
Route::get('/jewelry', [ProductController::class, 'jewelry']);
Route::get('/pants', [ProductController::class, 'pants']);
Route::get('/shirts', [ProductController::class, 'shirts']);
Route::get('/shoes', [ProductController::class, 'shoes']);
Route::get('/suits', [ProductController::class, 'suits']);
Route::get('/search', [ProductController::class, 'search']);

/* /////////CART///////////////CART////////////////CART//////////// */
Route::group(['middleware' => 'user'], function () {
    Route::get('/cart', [CartController::class, 'cart']);
    Route::post('/cart', [CartController::class, 'addtocart']);
    Route::get('/remove/{id}', [CartController::class, 'remove']);
    Route::get('/checkout', [CartController::class, 'checkout']);
    Route::get('/purchased', [CartController::class, 'purchased']);
});



