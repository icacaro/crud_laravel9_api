<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioPerfilController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//user 

Route::delete('/users/{user}',[UserController::class, 'delete']); 
Route::put('/users/{user}', [UserController::class, 'update']);
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
// Route::get('/users/create', [UserController::class, 'create']);
// Route::get('/users/{user}/edit', [UserController::class, 'edit']);

//coments 


Route::post('/comments/{userId}', [CommentController::class,'store']);
Route::get('/comments/{comment}', [CommentController::class,'show']);
Route::put('/comments/{comment}', [CommentController::class, 'update']);
Route::delete('/comments/{comment}',[CommentController::class, 'delete']);
// Route::get('/comments', [CommentController::class,'index']);
// Route::get('/users/{userId}/comments/create', [CommentController::class,'create']);
// Route::get('/users/{userId}/comments/{id}', [CommentController::class,'edit']);

// perfil

Route::post('/perfis', [PerfilController::class, 'store']);
Route::get('/perfis/{perfil}', [PerfilController::class, 'show']);
Route::put('/perfis/{perfil}', [PerfilController::class, 'update']);
Route::delete('/perfis/{perfil}',[PerfilController::class, 'delete']);
// Route::get('/perfis', [PerfilController::class, 'index']);
// Route::get('/perfis/create', [PerfilController::class, 'create']);
// Route::get('/perfis/{perfil}/edit', [PerfilController::class, 'edit']);

//usuario_perfil

Route::post('/usuarios-perfil', [UsuarioPerfilController::class, 'store']);
Route::get('/usuarios-perfil/{usuarioperfil}', [UsuarioPerfilController::class, 'show']);
Route::put('/usuarios-perfil/{usuarioperfil}', [UsuarioPerfilController::class, 'update']);
Route::delete('/usuarios-perfil/{usuarioperfil}',[UsuarioPerfilController::class, 'delete']);
Route::get('/usuarios-perfil/{usuarioperfil}/edit', [UsuarioPerfilController::class, 'edit']);
// Route::get('/ usuarios-perfil/create', [UsuarioPerfilController::class, 'create']);