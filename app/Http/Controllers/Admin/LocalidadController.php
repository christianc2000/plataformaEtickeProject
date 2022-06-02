<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Localidad;
use App\Models\localidadEvento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LocalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Evento $evento)
    {
        $localidades = Localidad::all();
        $locE = $evento->localidadesEvento;
        // return $evento->localidadesEvento;
        return view('admin.localidad.index', compact('evento', 'localidades', 'locE'));
    }
    
    public function index_evento_localidad($id)
    {
        $evento_id = $id;
        
        $nombre_evento  = Evento::all()->find($evento_id);
        $nombre_evento = $nombre_evento->title;
      //  $localidadesResponse = Http::get("http://127.0.0.1:8000/api/localidades/" . $id);
        $localidades = Localidad::all();
        // dd($localidades);
        // dd($eventos);
        return view('admin.localidad.indexl', compact('localidades', 'evento_id', 'nombre_evento'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  //     	id 	ubicacion 	direccion 	nombre 	capacidad 	created_at 	updated_at 	
        //dd($request->all());
       
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
    public function destroy($id)
    {
        //
    }
}
