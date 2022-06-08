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
use App\Models\SeccionLocalidad;
use App\Models\Telefono;
use Illuminate\Http\Request;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
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
                        $pluckCollection = $collection->pluck('id');
                        foreach ($imgE as $im) {
                            if (!$pluckCollection->contains($im->id)) {
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
        function contarChar($char, $cadena)
        {
            $n = strlen($cadena);
            $c = 0;
            for ($i = 0; $i < $n; $i++) {
                if ($cadena[$i] == $char)
                    $c++;
            }
            return $c;
        }
        $urlH = redirect()->getUrlGenerator()->previous(); //URL de la anterior dirección en horarios
        $indexF = strripos($urlH, '/') + 1;
        $cadUltimo = substr($urlH, $indexF);

        if ($cadUltimo == "horario") {
            $n = strlen("http://127.0.0.1:8000/admin/evento/");
            $idLEH = substr($urlH, $n, 1);
            $parteUno = substr($urlH, $n);
            $idLEH = substr($parteUno, 0, strpos($parteUno, '/'));
            $le = localidadEvento::all()->find($idLEH);
            return redirect()->route('admin.evento.localidadHorario.index', $le);
        } else {
            return redirect()->route('admin.evento.index');
        }
    }
    public function localidadIndex(Evento $evento) //$id del Evento
    {
        $localidades = Localidad::all();
        $locE = $evento->localidadesEvento;
        // return $evento->localidadesEvento;
        return view('admin.localidad.index', compact('evento', 'localidades', 'locE'));
    }
    public function localidadStore(LocalidadRequest $request, Evento $evento) //$id del Evento
    {
        $l = Localidad::create(
            [
                'ubicación' => $request->direction,
                'gps' => $request->gps,
                'nombreInfraestructura' => $request->name,
                'capacidadMaxima' => $request->capacidad
            ]
        );
       
            if ($request->phones1 != null) {
                Telefono::create([
                    'telefono' => $request->phones1,
                    'localidad_id' => $l->id
                ]);
            }
            if ($request->phones2 != null) {
                Telefono::create([
                    'telefono' => $request->phones2,
                    'localidad_id' => $l->id
                ]);
            }
           $sectores=$request->sectors;
           $capacidades=$request->capacidads;
           $colores=$request->colors;
            for ($i=0; $i < count($sectores); $i++) { 
                SeccionLocalidad::create([
                    'nombre'=>$sectores[$i],
                    'color'=>$colores[$i],
                    'capacidadSector'=>$capacidades[$i],
                    'localidad_id'=>$l->id                       
                ]);
            }
        $localidades = Localidad::all();
        return redirect()->route('admin.evento.localidad.index', compact('evento', 'localidades'));
    }
    public function localidadUpdate(Request $request, localidadEvento $le)
    {
        $request->validate([
            "name" => 'required',
            "gps" => 'required',
            "direction" => 'required',
            "phones" => 'required',
            "capacidad" => 'required'
        ]);
        $localidad = Localidad::all()->find($le->localidad_id);
        $localidad->nombreInfraestructura = $request->name;
        $localidad->gps = $request->gps;
        $localidad->ubicación = $request->direction;
        $localidad->capacidadMaxima = $request->capacidad;
        $localidad->save();
        $evento = $le->evento_id;

        return redirect()->route('admin.evento.localidadHorario.index', compact('le'));
    }

    //Crear un localidadEvento
    public function localidadEventoStore(LocalidadEventoRequest $request, Evento $evento)
    {
        $loc = Localidad::all()->where('nombreInfraestructura', '=', $request->localidad)->first();
       
        $le=localidadEvento::create(['localidad_id' => $loc->id, 'evento_id' => $evento->id]);
        
        $localidades = Localidad::all();
   
        return redirect()->route('admin.evento.localidad.index', compact('evento', 'localidades'));
    }
    //Eliminar un localidadEvento
    public function localidadEventoDelete(localidadEvento $le)
    {
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
        $e=$evento->title;
        $evento->delete();
        Session::flash('evento_borrado','El evento '.$e.' ha sido eliminado con exito');
        return redirect()->route('admin.evento.index');
    }
}
