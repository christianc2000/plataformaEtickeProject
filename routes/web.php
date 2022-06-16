<?php

use App\Http\Controllers\PrincipalController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>true,'verify'=>true]);
/*
Route::get('contactanos',function(){
   $correo=new ContactanosMailable;
   Mail::to('christiancelsomamanisoliz0@gmail.com')->send($correo);
   return "Mensaje enviado";
});*/

Route::get('eticket/principal',[PrincipalController::class,'index'])->name('principal.index');
Route::get('eticket/principal/{le}/horario/{f}',[PrincipalController::class,'horarioEvento'])->name('principal.horario.index');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth','verified'])->name('home');
