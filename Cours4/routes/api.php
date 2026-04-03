<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// Routes d'authentification API
Route::post('/login', [AuthController::class, 'apiLogin']);
Route::post('/register', [AuthController::class, 'apiRegister']);
// Routes protégées par JWT (nécessitent un token valide)
Route::middleware('auth:api')->group(function () {
Route::get('/profile', [AuthController::class, 'profile']);
// On pourra ajouter d'autres routes protégées ici plus tard
});