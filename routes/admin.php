<?php

use App\Http\Controllers\Admin\ConfiguracionController;
use App\Http\Controllers\Admin\EventoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\HorarioController;
use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Admin\LocalidadController;

Route::get('', [HomeController::class,'index'])->name('admin.index');
Route::resource('evento',EventoController::class)->names('admin.evento');
Route::resource('image', ImagesController::class)->names('admin.images');


Route::get('evento/{le}/configuracion',[ConfiguracionController::class, 'index'])->name('admin.eventoLocalidadConfiguracion.index');
Route::post('evento/{le}/configuracion/Fecha',[ConfiguracionController::class, 'store'])->name('admin.eventoLocalidadConfiguracion.store');
Route::post('evento/{le}/configuración/Area',[ConfiguracionController::class, 'storeArea'])->name('admin.eventoLocalidadConfiguracion.storeArea');
Route::delete('evento/{le}/{f}/horario',[ConfiguracionController::class, 'deleteHorario'])->name('admin.eventoLocalidadConfiguracion.delete');

//configurar Espacios de una fecha de un Evento Localidad
Route::get('evento/Localidad/{le}/fecha/{f}/espacio/index',[ConfiguracionController::class,'indexEspacio'])->name('admin.eventoLocalidad.espaciosFecha.index');
Route::post('evento/Localidad/{le}/fecha/{f}/espacio/store',[ConfiguracionController::class,'storeEspacio'])->name('admin.eventoLocalidad.espaciosFecha.store');
Route::get('evento/Localidad/{le}/fecha/{f}/espacio/destroy',[ConfiguracionController::class,'deleteEspacio'])->name('admin.eventoLocalidad.espaciosFecha.delete');
//fin Configurar Espacios de una fecha de un Evento Localidad

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