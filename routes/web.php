<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;

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
//     return view('home');
// });

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




Route::get('/admin', [ProductsController::class, 'index'])->name('dashboard');
Route::get('/admin/product_list', [ProductsController::class, 'index'])->name('dashboard.product_list');
Route::get('/admin/product_add', [ProductsController::class, 'create'])->name('dashboard.product_add_form');
Route::post('/admin/product_add', [ProductsController::class, 'store'])->name('dashboard.product_add');
Route::get('/admin/product_edit/{id}', [ProductsController::class, 'edit'])->name('dashboard.product_edit_form');
Route::post('/admin/product_edit', [ProductsController::class, 'update'])->name('dashboard.product_edit');
Route::post('/admin/product_delete', [ProductsController::class, 'destroy'])->name('dashboard.product_delete');




Route::get('/admin/categorie_list', [CategoriesController::class, 'index'])->name('dashboard.categorie_list');
Route::get('/admin/categorie_add', [CategoriesController::class, 'create'])->name('dashboard.categorie_add_form');
Route::post('/admin/categorie_add', [CategoriesController::class, 'store'])->name('dashboard.categorie_add');
Route::get('/admin/categorie_edit/{id}', [CategoriesController::class, 'edit'])->name('dashboard.categorie_edit_form');
Route::post('/admin/categorie_edit', [CategoriesController::class, 'update'])->name('dashboard.categorie_edit');
Route::post('/admin/categorie_delete', [CategoriesController::class, 'destroy'])->name('dashboard.categorie_delete');



// Voici ensuite la route qui va retourner la vue qui mène à votre formulaire d'inscription :

    Route::get('/register', function () {
        return view('Auth.register');
    })->name('register');


    // Voici enfin la route qui va permettre de lire le contenu de la fonction register : 
Route::post('/register',[AuthController::class,"register"])->name('register_user');