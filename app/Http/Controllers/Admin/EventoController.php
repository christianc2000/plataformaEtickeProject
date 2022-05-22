<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventoRequest;
use App\Http\Requests\LocalidadEventoRequest;
use App\Http\Requests\LocalidadRequest;
use App\Models\Category;
use App\Models\Evento;
use App\Models\Images;
use App\Models\Localidad;
use App\Models\localidadEvento;
use Illuminate\Http\Request;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\support\Facades\Storage;

use function PHPUnit\Framework\isNull;

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
        if ($request->hasFile('image')) {
            $imagenes = $request->file('image');

            foreach ($imagenes as $imagen) {
                $nombre = time() . '_' . $imagen->getClientOriginalName();
                $ruta = public_path() . '/storage/imagenes';
                $imagen->move($ruta, $nombre);
                $urlimagenes[]['url'] = '/storage/imagenes/' . $nombre;
                // $imagen->store('public/imagenes/evento/prueba');
                //return $imagen;
            }
            //para recupera las url de las imagenes ya guardas y usarlas para crear el modelo image
            $i = 1;
            foreach ($urlimagenes as $urli) {
                if ($i == 1) {
                    $img = Images::create([
                        'position_id' => 1,
                        'url' => Arr::get($urli, 'url'),
                        'imageable_id' => $c->id,
                        'imageable_type' => Evento::class,
                    ]);
                } else {
                    $img = Images::create([
                        'position_id' => 2,
                        'url' => Arr::get($urli, 'url'),
                        'imageable_id' => $c->id,
                        'imageable_type' => Evento::class,
                    ]);
                }
                $i++;
            }
        }
        return redirect()->route('admin.evento.index');
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

        $evento = Evento::all()->find($id);
        $images = $evento->image;
        $img = $evento->image;


        return view('admin.evento.show', compact('evento', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response]
     */
    public function edit(Evento $evento)
    {


        $categories = Category::all();
        $image = $evento->image;

        //return view('prueba');

        return view('admin.evento.edit2', compact('categories', 'evento', 'image'));
        //return view('admin.evento.edit', compact('evento', 'categories', 'image'));
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
        $imgE = $evento->image;
        $e = Evento::all();
        //  return $imgE->isEmpty();
        if (!$imgE->isEmpty()) { //Si está vació las imágenes del evento no se podrá eliminar nada
            $json = json_decode($request->json); //en array todas las imágenes que estén en la vistas, las que se eliminó no saldrán
            $collection = collect($json); //en colección
            //return $collection->pluck('id');
            
            if (count($imgE) == 1 && count($collection) == 0) {
                $imgE->first()->delete();
            } else {
                if (count($imgE) != count($collection)) {
                    if (count($collection) == 0) {
                        foreach ($imgE as $im) {
                            $im->delete();
                        }
                    } else {
                        $pluckCollection=$collection->pluck('id');
                        foreach ($imgE as $im) {
                            if(!$pluckCollection->contains($im->id)){
                                 $im->delete();
                            }
                        }
                    }
                }
            }
        }

        $evento->title = $request->title;
        $evento->description = $request->description;
        $evento->category_id = $request->category_id;
        $evento->save();
        //    $c->save();

        if ($request->hasFile('image')) {
            $imagenes = $request->file('image');

            foreach ($imagenes as $imagen) {
                $nombre = time() . '_' . $imagen->getClientOriginalName();
                $ruta = public_path() . '/storage/imagenes';
                $imagen->move($ruta, $nombre);
                $urlimagenes[]['url'] = '/storage/imagenes/' . $nombre;
                // $imagen->store('public/imagenes/evento/prueba');
                //return $imagen;
            }
            //para recupera las url de las imagenes ya guardas y usarlas para crear el modelo image
            $i = 1;
            foreach ($urlimagenes as $urli) {
                if ($i == 1) {
                    $img = Images::create([
                        'position_id' => 1,
                        'url' => Arr::get($urli, 'url'),
                        'imageable_id' => $evento->id,
                        'imageable_type' => Evento::class,
                    ]);
                } else {
                    $img = Images::create([
                        'position_id' => 2,
                        'url' => Arr::get($urli, 'url'),
                        'imageable_id' => $evento->id,
                        'imageable_type' => Evento::class,
                    ]);
                }
                $i++;
            }
        }
        return redirect()->route('admin.evento.index');
    }
    public function localidadIndex(Evento $evento) //$id del Evento
    {
        $localidades = Localidad::all();

        // return $evento->localidadesEvento;
        return view('admin.localidad.index', compact('evento', 'localidades'));
    }
    public function localidadStore(LocalidadRequest $request, Evento $evento) //$id del Evento
    {

        Localidad::create(
            [
                'ubicación' => $request->direction,
                'gps' => $request->gps,
                'nombreInfraestructura' => $request->name,
                'capacidadMaxima' => $request->capacidad
            ]
        );
        $localidades = Localidad::all();
        return redirect()->route('admin.evento.localidad.index', compact('evento', 'localidades'));
    }
    //Crear un localidadEvento
    public function localidadEventoStore(LocalidadEventoRequest $request, Evento $evento)
    {
        $loc = Localidad::all()->where('nombreInfraestructura', '=', $request->localidad)->first();
        localidadEvento::create(['localidad_id' => $loc->id, 'evento_id' => $evento->id]);
        $localidades = Localidad::all();
        return redirect()->route('admin.evento.localidad.index', compact('evento', 'localidades'));
    }
    //Eliminar un localidadEvento
    public function localidadEventoDelete($id)
    {
        $le = localidadEvento::all()->find($id);
        $evento = Evento::all()->find($le->evento_id);
        $le->delete();
        $localidades = Localidad::all();

        return redirect()->route('admin.evento.localidad.index', compact('evento', 'localidades'));
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
