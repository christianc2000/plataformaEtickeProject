<?php

use App\Http\Controllers\Admin\EventoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

Route::get('', [HomeController::class,'index'])->name('admin.index');
Route::resource('evento',EventoController::class)->names('admin.evento');
