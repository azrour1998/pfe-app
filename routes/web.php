<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\HistoriqueController;



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
    return view('welcome');
});

Route::get('addArticle', [ArticleController::class, 'index'])->name('addArticle');



Route::get('historique', [HistoriqueController::class, 'index']);
Route::get('historique', [HistoriqueController::class, 'Historique']);



Route::post('addArticle', [ArticleController::class, 'addArticle'])->name('addArticle');

Route::get('addFournisseur', [FournisseurController::class, 'index'])->name('addFournisseur');

Route::post('addFournisseur', [FournisseurController::class, 'addFournisseur'])->name('addFournisseur');

Route::get('afficherArticle', [ArticleController::class, 'afficherArticle'])->name('afficherArticle');

Route::get('afficherFournisseur', [FournisseurController::class, 'afficherFournisseur'])->name('afficherFournisseur');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
