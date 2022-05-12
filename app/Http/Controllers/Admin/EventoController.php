<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventoRequest;
use App\Models\Category;
use App\Models\Evento;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::all();
        return view('admin.evento.index', compact('eventos'));
    }
    public function create()
    {
        $evento = Evento::all();
        $categories = Category::all();

        return view('admin.evento.create', compact('categories', 'evento')); //,'evento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventoRequest $request)
    {


        $p = $request->except('image');
        $c = Evento::create($p);
        $imagenes = $request->file('image')->store('public/imagenes/evento');
        $url = Storage::url($imagenes);

        $img=Image::create([
            'url' => $url,
            'imageable_id'=>$c->id,
            'imageable_type'=>Evento::class,
        ]);
        return $img;
        //return redirect()->route('admin.evento.index');
        // $c = Evento::create($request->all());
        //return redirect()->route('admin.evento.index');
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
        $categories = Category::all();
        return view('admin.evento.edit', compact('evento', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventoRequest $request, Evento $evento)
    {
        $evento->update($request->all());
        //$r=['title'=>$request->title,'description'=>$request->description,'category_id'=>$request->category_id];
        //return $r;
        return redirect()->route('admin.evento.index');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Evento::all()->find($id);
        $evento->delete();
        return redirect()->route('admin.evento.index');
    }
}
