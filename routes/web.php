<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PanierController;


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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('products', ProductController::class)->middleware('auth');

Route::resource('produits', ArticleController::class);

Route::get('categories/{id}',[CategorieController::class,'show'])->name('categories.show');

Route::get('panier', [PanierController::class,'show'])->name('panier.show');
Route::post('panier/add/{product}', [PanierController::class,'add'])->name('panier.add');
Route::get('panier/remove/{product}', [PanierController::class,'remove'])->name('panier.remove');
Route::get('panier/empty', [PanierController::class,'empty'])->name('panier.empty');

require __DIR__.'/auth.php';
