<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HorarioRequest;
use App\Models\Area;
use App\Models\CantidadArea;
use App\Models\Category;
use App\Models\Evento;
use App\Models\Fecha;
use App\Models\Horario;
use App\Models\Localidad;
use App\Models\localidadEvento;
use App\Models\SeccionLocalidad;
use App\Models\SectorArea;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(localidadEvento $le)
    {
      
        $evento = Evento::all()->find($le->evento_id);
        $localidad = Localidad::all()->find($le->localidad_id);
        $categories = Category::all();
        $fechas = $le->fechas;
        $prueba= $fechas->first();
        
        $sectorareas = $le->sectorAreas;

        $sectores = $localidad->seccionLocalidads;
        return view('admin.configurar.index', compact('le', 'evento', 'localidad', 'categories', 'fechas', 'sectorareas', 'sectores'));
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
    public function storeArea(Request $request, localidadEvento $le)
    {

        $s = json_decode($request->json, true);
        $sectors = collect($s);

        foreach ($sectors as $sector) {

            $sector = $sector['content'];
            if ($sector != null) {
                foreach ($sector as $areas) {
                    if ($areas) {
                        $a = Area::create([
                            'nombre' => $areas['nombre'],
                            'capacidad' => $areas['capacidad'],
                            'nivel' => 1
                        ]);
                        $sa = SectorArea::create([
                            'seccion_localidad_id' => $areas['idSector'],
                            'precio' => $areas['precio'],
                            'color' => $areas['color'],
                            'area_id' => $a->id,
                            'localidad_evento_id' => $le->id
                        ]);
                    }
                }
            }
        }
        return redirect()->route('admin.eventoLocalidadConfiguracion.index', $le);
    }

    /*para configurar el espacio de cada sector */
    public function indexEspacio(localidadEvento $le, Fecha $f)
    {
        $sectorAreas=$le->sectorAreas; //capacidad general de los sectores areas en el evento localidad
       
        $capacidadArea=$f->cantidadAreas;//la capacidad que se registra de un area en tal fecha
        $localidad=$le->localidad; //localidad
        //return $sectorAreas;
        return view('admin.configurar.espacio.index', compact('le', 'f','sectorAreas','localidad','capacidadArea'));
    }

    public function storeEspacio(Request $request, localidadEvento $le, Fecha $fecha)
    {
    }
    public function deleteEspacio(localidadEvento $le, Fecha $fecha)
    {
    }
    /* fin configurar el espacio de cada sector*/

    public function store(Request $request, localidadEvento $le)
    {
        $f = Fecha::create([
            'fecha' => $request->fecha,
            'hora' => $request->horaEvento,
            'duracion' => $request->duración,
            'localidad_evento_id' => $le->id
        ]);
        //llena por defecto los espacios de esa área
        $areasH = Area::all()->where('nivel', '=', 2);
        $areasH = $areasH->where('nombre', '=', 'individual')->first();
        foreach ($le->sectorAreas as $espacio) {
            $precio=(int)($espacio->precio);
            
            CantidadArea::create([
                'cantidad' => $espacio->area->capacidad,
                'precio' => $precio,
                'stock' => $espacio->area->capacidad,
                'prefijo' => "indv",
                'tipo'=>'p',
                'areaP_id' => $espacio->id,
                'areaH_id' => $areasH->id,
                'fecha_id' => $f->id,
            ]);
        }
        //CantidadArea::created();
        return redirect()->route('admin.eventoLocalidadConfiguracion.index', $le);
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
    public function update(Request $request, localidadEvento $le)
    {
        return redirect()->getUrlGenerator()->previous();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteHorario(localidadEvento $le, Fecha $f)
    {
        $f->delete();
        return redirect()->route('admin.eventoLocalidadConfiguracion.index', $le);
    }

    public function destroy($id)
    {
        //
    }
}
