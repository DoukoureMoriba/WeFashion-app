<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('home');
});

// Route pour les différentes vues.
Route::get('/login', function() {
    return view('Auth.login');
})->name("login");

Route::get('/register', function() {
    return view('Auth.register');
})->name("register");


// Route pour vérifer les authenfications
Route::post('/login',[AuthController::class,"auth"])->name('authenticate');
Route::get('/admin',[DashboardController::class,"index"])->name('dashboard');

// Route pour afficher les paginations et les boucles
Route::get('/', [HomeController::class, 'all'])->name('all');
Route::get('/is_Sale', [HomeController::class, 'isSale'])->name('isSale');
Route::get('/categorie/{id}', [HomeController::class, 'sortByCategorie'])->name('categorie');
Route::get('/show/{id}', [HomeController::class, 'show'])->name('show');