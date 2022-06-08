<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Evento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = Category::all();
        Evento::create([
            'title' => "Último tour Daddy Yankee",
            'description' => "El último recorrido del rey de la música urbana antes de su retiro",
            'category_id' => $c->first()->id
        ]);
        Evento::create([
            'title' => "Tour latinoamerica Bad Bunny",
            'description' => "El conejo malo realizará un tours en donde presentará su nuevo albúm llamado un Verano sin tí",
            'category_id' => $c->first()->id
        ]);
        Evento::create([
            'title' => "Spiderman No way home",
            'description' => "Una de las entregas de marvel, en dónde se verá una fusión de mundos. Una aventura fantástica para los amantes de este personaje",
            'category_id' => $c->last()->id
        ]);
    }
}
