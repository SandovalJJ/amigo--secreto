<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\amigoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ruletaController;
use App\Http\Controllers\preferenciasController;
use App\Http\Controllers\loginController;

Route::get('/', function () {
    return redirect('login');
	});

Route::get('/registro', [loginController::class, 'registro']);
Route::post('/registro', [loginController::class, 'crear_usuario']);

Route::get('/login', [loginController::class, 'index']);
Route::post('/login', [loginController::class, 'autenticar'])->name('login');

Route::post('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('./layaut/sidebar',[sidebarController::class, 'side'])->middleware('auth');
Route::get('/preferencias',[preferenciasController::class, 'index2'])->middleware('auth');
Route::post('/guardar_dulce', [preferenciasController::class, 'guardar_dulce'])->middleware('auth');
Route::post('/guardar_regalo', [preferenciasController::class, 'guardar_regalo'])->middleware('auth');

Route::get('/ruleta',[ruletaController::class, 'index'])->middleware('auth');
Route::get('/amigo',[amigoController::class, 'index'])->middleware('auth');
Route::post('/guardar_amigo', [preferenciasController::class, 'guardar_amigo'])->middleware('auth');

Route::get('/parejas',[adminController::class, 'parejas'])->middleware('auth');
Route::get('/inscritos',[adminController::class, 'inscritos'])->middleware('auth');
Route::post('/validar',[adminController::class, 'validar']);
Route::post('/validar_nombre',[adminController::class, 'validar_nombre']);
Route::post('/validar_p_apellido',[adminController::class, 'validar_p_apellido']);
Route::post('/validar_s_apellido',[adminController::class, 'validar_s_apellido']);
Route::post('/validar_fecha',[adminController::class, 'validar_fecha']);
Route::get('/por_girar',[adminController::class, 'por_girar'])->middleware('auth');
Route::get('/por_elegir',[adminController::class, 'por_elegir'])->middleware('auth');
Route::get('/por_inscribir',[adminController::class, 'por_inscribir'])->middleware('auth');
Route::get('/agencias',[adminController::class, 'agencias'])->middleware('auth');
Route::get('/auto',[adminController::class, 'auto'])->middleware('auth');


//Rutas que modifican el modal del mensaje de bienvenida
Route::get('/bienvenida', function () {
    return view('bienvenida');
});

Route::post('/save-content',[adminController::class, 'store'])->name('save.content')->middleware('auth');
Route::get('/latest-content', [adminController::class, 'getLatestContent']);







