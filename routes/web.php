<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\TaskersController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\categoriesController;

use App\Http\Controllers\ReviewsController;

use App\Http\Controllers\UorderController;

use Illuminate\Support\Facades\Route;


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


Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/',[PagesController::class,'index']);
Route::get('category/{{name}}',[PagesController::class,'Category']);

Route::get('tasker/login', 'App\Http\Controllers\TaskerAuthController@showLoginForm')->name('tasker.login');
// Route::post('/tasker/submit', 'App\Http\Controllers\TaskerAuthController@login')->name('tasker.login.submit');
Route::get('/tasker/submit',[App\Http\Controllers\TaskerAuthController::class,'login'])->name('tasker.submit');

Route::resource('/tasker',TaskersController::class);

Route::resource('/order',OrdersController::class);
Route::get('/order/create/{tasker_id}',[OrdersController::class,'createOrder'])->name('order.createOrder');
// Route::resource('/Reviews',ReviewsController::class);
Route::get('/categories/{category}', [CategoriesController::class,'showTaskers'])->name('categories.showTaskers');

Route::get('/review/create/{tasker_id}',[ReviewsController::class,'create'])->name('review.create');
Route::post('/reviews/store', [ReviewsController::class, 'store'])->name('review.store');
Route::get('/categories/{category_Id}/tasker',[TaskersController::class,'showByCategory'])->name('taskers.byCategorys');
//Route::get('/tasker/profile', [TaskerController::class,'myProfile'])->name('tasker.profile');

Route::resource('/MyWork',TrequestsController::class);

Route::resource('/MyOrders',UorderController::class);

Route::middleware('auth:tasker')->group(function () {
    // Tasker-specific routes
    Route::get('tasker/profile', 'App\Http\Controllers\TaskerController@showProfile')->name('tasker.profile');
});






