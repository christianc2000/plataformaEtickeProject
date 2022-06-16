<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Fecha;
use App\Models\Localidad;
use App\Models\localidadEvento;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{

    public function index()
    {

        $fechas = Fecha::all();

        // return $fechas;
        //return $eventos->first()->image;
        return view('publico.index', compact('fechas'));
    }
    public function horarioEvento(localidadEvento $le, Fecha $f)
    {
        $fechas=Fecha::all()->where('fecha','=',$f->fecha);
        $horario=$fechas->where('localidad_evento_id','=',$le->id);//todas las horas de esa fecha de ese localidadEvento;
        
        return view('publico.horarioEvento',compact('horario','le'));
    }
}
