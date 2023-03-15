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
Route::patch('afficherArticle/{id}', [ArticleController::class, 'update'])->name('update');
Route::delete('afficherFournisseur/{id}', [FournisseurController::class, 'destroy'])->name('destroy');
Route::delete('afficherUser/{id}', [UserController::class, 'destroy'])->name('destroy');
Route::get('reset', [ResetPasswordController::class, 'validatePasswordRequest'])->name('validatePasswordRequest');

Route::post('reset', [ResetPasswordController::class, 'validatePasswordRequest'])->name('validatePasswordRequest');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
 
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;
 
Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

Route::get('email', [ResetPasswordController::class, 'validatePasswordRequest'])->name('validatePasswordRequest');

Route::post('email', [ResetPasswordController::class, 'validatePasswordRequest'])->name('validatePasswordRequest');

Route::get('afficherFournisseur', [FournisseurController::class, 'afficherFournisseur'])->name('afficherFournisseur');
Route::middleware(['auth','role:administrateur'])->group(function(){
    Route::post('addUser', [UserController::class, 'addUser'])->middleware('auth')->name('addUser');
    Route::get('afficherUser', [UserController::class, 'afficherUser'])->middleware('auth')->name('afficherUser');
    
    Route::get('addUser', [UserController::class, 'index','store'])->name('addUser');





});

Auth::routes();
Route::get('/userInfo/{id}/update', [userController::class, 'update'])->name('update');
Route::post('/userInfo/{id}/update', [userController::class, 'update'])->name('update');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('change-password');
Route::post('/change-password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('update-password');
Route::get('documentation', [App\Http\Controllers\documentationController::class, 'index'])->name('documentation');


