<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventoRequest;
use App\Models\Category;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::all();
         return view('admin.evento.index',compact('eventos'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.evento.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventoRequest $request)
    {

        $c = Evento::create($request->all());
        return redirect()->route('admin.evento.index');
        //return view('admin.localidad.asignar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response]
     */
    public function edit($id)
    {
        $evento = Evento::all()->find($id);
        $categories=Category::all();
        return view('admin.evento.edit', compact('evento','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventoRequest $request, $id)
    {
     //    $evento=Evento::all()->find($id);
         //$nevento=$evento->update($request);
        // return $evento;
        return "entra";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento=Evento::all()->find($id);
        $evento->delete();
        return redirect()->route('admin.evento.index');
    }
}
