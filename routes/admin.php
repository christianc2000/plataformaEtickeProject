<?php

use App\Http\Controllers\Admin\EventoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\HorarioController;
use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Admin\LocalidadController;

Route::get('', [HomeController::class,'index'])->name('admin.index');
Route::resource('evento',EventoController::class)->names('admin.evento');
Route::resource('image', ImagesController::class)->names('admin.images');
Route::resource('horario',HorarioController::class)->names('admin.horario');
Route::get('evento/{le}/horario',[HorarioController::class, 'indexHorario'])->name('admin.evento.localidadHorario.index');
Route::post('evento/{le}/horario',[HorarioController::class, 'StoreHorario'])->name('admin.evento.localidadHorario.store');
Route::delete('evento/{le}/{h}/horario',[HorarioController::class, 'deleteHorario'])->name('admin.evento.localidadHorario.delete');
Route::put('evento/{le}/horario',[HorarioController::class, 'updateEventoHorario'])->name('admin.evento.localidadHorarioEvento.update');



Route::get('/evento/{evento}/localidad',[EventoController::class,'localidadIndex'])->name('admin.evento.localidad.index');
Route::post('/evento/{evento}/localidad',[EventoController::class,'localidadStore'])->name('admin.evento.localidad.store');
Route::put('/evento/{le}/localidad',[EventoController::class,'localidadUpdate'])->name('admin.evento.localidad.update');

Route::post('/evento/{evento}/localidadEvento',[EventoController::class,'localidadEventoStore'])->name('admin.evento.localidadEvento.store');
Route::delete('/evento/{le}/localidadEventoDelete',[EventoController::class,'localidadEventoDelete'])->name('admin.evento.localidadEvento.delete');
route::post('/evento/{evento}/eventolocalidad',[LocalidadController::class,'eventoLocalidadstore'])->name('admin.eventoLocalidad.store');

//localidad API GOOGLE MAP
/*Route::resource('localidad',LocalidadController::class)->names('admin.localidad');
Route::get('localidad/create/{evento_id?}',[LocalidadController::class,'create'])->name('admin.localidad.create');
Route::get('localidades/{evento_id}',[LocalidadController::class,'index_evento_localidad'])->name('admin.evento_localidad');
*/