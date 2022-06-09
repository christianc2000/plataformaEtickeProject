<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'nombre'=>"butaca",
            'capacidad'=>1,
            'nivel'=>2
        ]);
        Area::create([
            'nombre'=>"mesa grupal",
            'capacidad'=>6,
            'nivel'=>2
        ]);
        Area::create([
            'nombre'=>"mesa pareja",
            'capacidad'=>2,
            'nivel'=>2
        ]);
        Area::create([
            'nombre'=>"individual",
            'capacidad'=>1,
            'nivel'=>2
        ]);
        Area::create([
            'nombre'=>"silla",
            'capacidad'=>1,
            'nivel'=>2
        ]);
    }
}
