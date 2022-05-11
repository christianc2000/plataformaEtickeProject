<?php

use App\Http\Controllers\Admin\EventoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

Route::get('', [HomeController::class,'index'])->name('admin.home');
Route::get('/Evento',[EventoController::class,'index'])->name('admin.evento.index');
