<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/redirect', [HomeController::class, 'home'])->name('home');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/login', [HomeController::class, 'login'])->name('login');

// this is admin-section
//Category
Route::get('/Category', [AdminController::class, 'categoryAdd'])->name('categoryAdd');
Route::post('/categorySave', [AdminController::class, 'categoryAdded'])->name('categoryAdded');
Route::get('/categorydelete/{id}', [AdminController::class, 'categoryDelete'])->name('categoryDelete');

//Product
Route::get('/addProduct', [ProductController::class, 'addProduct'])->name('addProduct');
Route::get('/showProduct', [ProductController::class, 'showProduct'])->name('showProduct');
Route::post('/storeProduct', [ProductController::class, 'storeProduct'])->name('storeProduct');
//delete Product
Route::get('/deleteProduct/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');

//Edit Product
Route::get('/editProduct/{id}', [ProductController::class, 'editProduct'])->name('editProduct');
Route::post('/updateProduct/{id}', [ProductController::class, 'updateProduct'])->name('updateProduct');

//Product detail
Route::get('/Productdetail/{id}', [HomeController::class, 'productDetail'])->name('productDetail');


//Add to cart
Route::post('/addtocart/{id}', [HomeController::class, 'addToCart'])->name('addToCart');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
