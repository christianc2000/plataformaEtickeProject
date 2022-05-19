<?php

use App\Http\Controllers\Admin\EventoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Admin\LocalidadController;

Route::get('', [HomeController::class,'index'])->name('admin.index');
Route::resource('evento',EventoController::class)->names('admin.evento');
Route::resource('image', ImagesController::class)->names('admin.images');

Route::get('/evento/{evento}/localidad',[EventoController::class,'localidadIndex'])->name('admin.evento.localidad.index');
Route::post('/evento/{evento}/localidad',[EventoController::class,'localidadStore'])->name('admin.evento.localidad.store');
Route::resource('localidad',LocalidadController::class)->names('admin.localidad');