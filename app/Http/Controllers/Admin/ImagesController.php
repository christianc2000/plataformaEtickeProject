<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Images;
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
                if($imag!=$img){
                    $imag->delete;
                }
            }
        }
        return redirect()->route('admin.evento.show',$evento);
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

        //   return Evento::all()->find($imag->imageable_id)->image;
        if ($imag->position_id != 1) {
            $aux = Images::all()->where('position_id', '=', 1)->first();

            $aux->position_id = 2;

            $aux->save();

            $imag->position_id = 1;
            $imag->save();
        }
        $e = Evento::all()->find($imag->imageable_id);
        $img = $e->image;

        return redirect()->route('admin.evento.edit', $e);
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
