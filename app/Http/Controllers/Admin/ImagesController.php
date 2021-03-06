<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Images;
use App\Models\localidadEvento;
use Illuminate\Http\Request;
use Mockery\Generator\Method;
use Psy\Readline\Hoa\EventSource;

class ImagesController extends Controller
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
        function buscarEvento($url)
        {
            $img = Images::all()->where('url', '=', $url)->first();
            $e = Evento::all()->where('id', '=', $img->imageable_id)->first();
            return $e;
        }
        $n = strlen("http://127.0.0.1:8000");
        $urls = json_decode($request->json);
        $s = substr($urls[0]->url, $n);
        $evento = buscarEvento($s);
        foreach ($urls as $url) {
            $url->url = substr($url->url, $n);
            $img = Images::all()->where('url', '=', $url->url)->first();
            foreach ($evento->image as $imag) {
                if ($imag != $img) {
                    $imag->delete;
                }
            }
        }
        return redirect()->route('admin.evento.show', $evento);
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

        $imag = Images::all()->find($id);
        $evento = Evento::all()->find($imag->imageable_id);
        $imagenes = $evento->image;
        //return $imagenes;
        $i = $imagenes->where('position_id', '=', 1)->first();
       
        if (!empty($i)) {
            $i->position_id = 2;
            $i->save();
        }
        $imag->position_id = 1;
        $imag->save();
    //    return redirect()->route('admin.evento.edit', $evento);

        $urlH=redirect()->getUrlGenerator()->previous();//URL de la anterior direcci??n en horarios
        $n=strlen("http://127.0.0.1:8000/admin/evento/");
        $idLEH=substr($urlH,$n,1);
        $parteUno=substr($urlH,$n);
        $idLEH=substr($parteUno,0,strpos($parteUno,'/'));
        $le = localidadEvento::all()->find($idLEH);
        if ("http://127.0.0.1:8000/admin/evento/".$le->id."/horario" == redirect()->getUrlGenerator()->previous()) {
           
            return redirect()->route('admin.evento.localidadHorario.index', $le);
        } else {
            return redirect()->route('admin.evento.edit', $evento);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $img = Images::all()->find($id);
        $evento = Evento::all()->find($img->imageable_id);
        $img->delete();

        return redirect()->route('admin.evento.edit', $evento->id);
    }
}
