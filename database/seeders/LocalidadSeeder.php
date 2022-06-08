<?php

namespace Database\Seeders;

use App\Models\Localidad;
use App\Models\SeccionLocalidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //localidad 1
        $l = Localidad::create([

            'ubicación' => "Calle Junín, diagonal al excorreo postal, Santa Cruz de la Sierra",
            'gps' => "-17.782923,-63.182954",
            'nombreInfraestructura' => 'Paraninfo Universitario “Dr. Humberto Parado Caro"',
            'capacidadMaxima' => 450,

        ]);
        SeccionLocalidad::create([
            'nombre' => "butacas",
            'color' => "#DE1D1D",
            'capacidadSector' => 450,
            'localidad_id' => $l->id
        ]);
        //localidad 2
        $loc = Localidad::create([

            'ubicación' => "Entre el primer y segundo anillo, entre las avenidas del Ejército Nacional, Ana Bárbara y Chóferes del Chaco en el centro, Santa Cruz de la Sierra",
            'gps' => "-17.796067, -63.183873",
            'nombreInfraestructura' => "Estadio Ramón 'Tahuichi' Aguilera",
            'capacidadMaxima' => 38000,

        ]);
        SeccionLocalidad::create([
            'nombre' => "curva Oeste",
            'color' => "#313E6C",
            'capacidadSector' => 7000,
            'localidad_id' => $loc->id
        ]);
        SeccionLocalidad::create([
            'nombre' => "curva Este",
            'color' => "#F6C23A",
            'capacidadSector' => 7000,
            'localidad_id' => $loc->id
        ]);
        SeccionLocalidad::create([
            'nombre' => "Butacas",
            'color' => "#BD3636",
            'capacidadSector' => 14300,
            'localidad_id' => $loc->id
        ]);
        SeccionLocalidad::create([
            'nombre' => "Graderias",
            'color' => "#3287A1",
            'capacidadSector' => 9700,
            'localidad_id' => $loc->id
        ]);
    }
}
