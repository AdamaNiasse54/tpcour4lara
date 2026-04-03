<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; // On va créer ce contrôleur ensuite

use App\Http\Controllers\AuthController; // On va créer ce contrôleur ensuite
Route::get('/', function () {
    return redirect('/login'); // ou view('welcome')
});
/*
|--------------------------------------------------------------------------
| Routes pour afficher les pages

|--------------------------------------------------------------------------
*/
// Route pour afficher le formulaire de connexion
Route::get('/login', function () {
   return view('auth.login');})->name('login'); // On donne un nom à la route pour pouvoir l'appeler facilement avec  route('login')
// Route pour afficher le formulaire d'inscription
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
/*
|--------------------------------------------------------------------------
| Routes pour traiter les formulaires (envoi en POST)
|--------------------------------------------------------------------------
*/
// Route qui reçoit les données du formulaire de login
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
// Route qui reçoit les données du formulaire d'inscription
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Tableau de bord admin (protégé par notre middleware admin)
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
    })->middleware('admin')->name('admin.dashboard'); // On applique le filtre ici
    // Tableau de bord user (protégé par le middleware auth de Laravel)
    Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->middleware('auth')->name('user.dashboard'); // 'auth' vérifie que l'utilisateur est connecté

Route::middleware(['admin'])->group(function () {
// La ligne suivante crée automatiquement toutes les routes pour le CRUD (index, create, store, etc.)
Route::resource('products', ProductController::class);});