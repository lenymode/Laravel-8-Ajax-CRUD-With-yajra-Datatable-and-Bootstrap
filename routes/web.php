<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [UserController::class, 'index'])->name('users');
Route::post('delete/{id}', [UserController::class, 'destroy'])->name('delete');


// Resource Route for article.
// Route for get articles for yajra post request.
Route::get('getproducts', [ProductController::class, 'getProduct'])->name('products');
Route::resource('products', 'ProductController', ['names' => [
    'index'     => 'Products.index',
    'create'    => 'Products.create',
    'store'     => 'Products.store',
    'edit'      => 'Products.edit',
    'update'    => 'Products.update'
]]);