<?php

use App\Http\Controllers\UsuariosController; 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::group(['middleware' => 'web'], function () {

    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('index');
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('/usuarios', [UsuariosController::class, 'index'])->middleware('auth');
Route::get('/usuarios/new', [UsuariosController::class, 'new'])->middleware('auth');
Route::post('/usuarios/add', [UsuariosController::class, 'add'])->middleware('auth');
Route::get('/usuarios/{id}/edit', [UsuariosController::class, 'edit'])->middleware('auth');
Route::post('/usuarios/update/{id}', [UsuariosController::class, 'update'])->middleware('auth');
Route::delete('/usuarios/delete/{id}', [UsuariosController::class, 'delete'])->middleware('auth');



