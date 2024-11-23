<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/*comme
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Page d'accueil (afficher les photos pour les visiteurs)
Route::get('/', [PhotoController::class, 'index'])->name('photos.index');

// Gestion des catégories (admin uniquement)
Route::resource('categories', CategoryController::class)->middleware('auth'); // CRUD pour les catégories

// Gestion des photos (artistes)
Route::resource('photos', PhotoController::class)->except(['index']); // CRUD pour les photos (index déjà défini)

Route::get('photos/{photo}', [PhotoController::class, 'details'])->name('photos.details');

// Ajouter des commentaires sur les photos (visiteurs)
Route::post('photos/{photo}/comments', [CommentController::class, 'store'])->name('comments.store');

// Répondre à un commentaire (artistes ou admin)
Route::post('comments/{comment}/reply', [CommentController::class, 'reply'])->name('comments.reply');

// Inscription des utilisateurs avec rôle artiste
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);

// Connexion et déconnexion (généré par Laravel Breeze ou Jetstream)
Auth::routes();
require __DIR__.'/auth.php';

