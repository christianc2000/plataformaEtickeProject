<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $evento = 'public/images/evento';//para direccionar la carpeta
        Storage::deleteDirectory($evento);//para eliminar la carpeta
        Storage::makeDirectory($evento);//para crear la carpeta
        // \App\Models\User::factory(10)->create();
        $this->call(CategorySeeder::class);
        $this->call(PersonaSeeder::class);
    }
}
