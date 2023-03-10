<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\HistoriqueController;
use App\Http\Controllers\HistoriqueUserController;
use App\Http\Controllers\UserController;


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
Route::get('documentation', function () {
    return view('documentation');
});
Route::get('addArticle', [ArticleController::class, 'index'])->name('addArticle');


Route::get('historique', [HistoriqueController::class, 'index'])->name('historique');
Route::get('categorie', [CategorieController::class, 'index'])->name('categorie');
Route::get('historique', [HistoriqueController::class, 'Historique'])->name('historique');
Route::get('historiqueUser', [HistoriqueUserController::class, 'Historiqueuser'])->name('historiqueUser');

Route::get('userInfo/{id}/show', [UserController::class, 'userInfo'])->name('userInfo');


Route::get('/historique/{id}/markAsSeen', [HistoriqueController::class, 'mark_as_seen'])->name('markAsSeen');
Route::get('/historique/{id}/deleteItem', [HistoriqueController::class, 'delete_item'])->name('deleteItem');

Route::get('/historiqueUser/{id}/markAsSeen', [HistoriqueUserController::class, 'mark_as_seen'])->name('markAsSeen');
Route::get('/historiqueUser/{id}/deleteItem', [HistoriqueUserController::class, 'delete_item'])->name('deleteItem');


Route::post('addArticle', [ArticleController::class, 'addArticle'])->name('addArticle');

Route::get('addFournisseur', [FournisseurController::class, 'index'])->name('addFournisseur');

Route::post('addFournisseur', [FournisseurController::class, 'addFournisseur'])->name('addFournisseur');

Route::get('afficherArticle', [ArticleController::class, 'afficherArticle'])->name('afficherArticle');
Route::delete('afficherArticle/{id}', [ArticleController::class, 'destroy'])->name('destroy');
Route::delete('afficherFournisseur/{id}', [FournisseurController::class, 'destroy'])->name('destroy');
Route::delete('afficherUser/{id}', [UserController::class, 'destroy'])->name('destroy');

Route::get('afficherFournisseur', [FournisseurController::class, 'afficherFournisseur'])->name('afficherFournisseur');
Route::middleware(['auth','role:administrateur'])->group(function(){
    Route::post('addUser', [UserController::class, 'addUser'])->middleware('auth')->name('addUser');
    Route::get('afficherUser', [UserController::class, 'afficherUser'])->middleware('auth')->name('afficherUser');
    
    Route::get('addUser', [UserController::class, 'index','store'])->name('addUser');





});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('documentation', [App\Http\Controllers\documentationController::class, 'index'])->name('documentation');


