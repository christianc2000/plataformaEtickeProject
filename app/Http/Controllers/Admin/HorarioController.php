<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HorarioRequest;
use App\Models\Category;
use App\Models\Evento;
use App\Models\Horario;
use App\Models\Localidad;
use App\Models\localidadEvento;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function indexHorario(localidadEvento $le)
    {
        $evento=Evento::all()->find($le->evento_id);
        $localidad=Localidad::all()->find($le->localidad_id);
        $categories=Category::all();
        $horarios=$le->horarios;
    
        return view('admin.configurar.index',compact('le','evento','localidad','categories','horarios'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function storeHorario(HorarioRequest $request, localidadEvento $le)
    {
        
        Horario::create([
            'fecha'=>$request->fecha,
            'horaEvento'=>$request->horaEvento,
            'duracion'=>$request->duración,
            'localidad_evento_id'=>$le->id
        ]);

        return redirect()->route('admin.evento.localidadHorario.index',$le);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteHorario(localidadEvento $le, Horario $h)
    {
        $h->delete();
        return redirect()->route('admin.evento.localidadHorario.index',$le);
    }
    public function destroy($id)
    {
        //
    }
}
