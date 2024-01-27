<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\ContactController;

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

Route::get('/', [IndexController::class, 'Index'])->name('home');
Route::get('/home', [HomeController::class, 'redirect'])->name('redirect');
// Route::get('/home', [HomeController::class, 'login'])->name('login');
// Route::get('/home', [HomeController::class, 'register'])->name('register');


 
Route::controller(AboutController::class)->group(function () {
    Route::get('/about', 'about')->name('about');
    Route::get('/property', 'property')->name('property');
    Route::get('/blog', 'blog')->name('blog');
    
});
 
Route::get('/contact', [ContactController::class, 'create'])->name('contact.get');//here contact is route but the name of the route is contact.get
Route::post('/contact', [ContactController::class, 'store'])->name('contact.post');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout ');
Route::get('/user', [HomeController::class, 'user'])->name('user');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
