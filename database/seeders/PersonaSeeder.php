<?php

namespace Database\Seeders;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'christian',
            'email' => 'chess@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $u=User::all()->first();
        Persona::create([
            'ci'=>'9821736',
            'name'=> $u->name,
            'lastname'=> 'mamani',
            'country'=>'26',
            'sex'=>'M',
            'fecha_nac'=>'04-01-2000',
            'user_id'=> $u->id
        ]);
    }
}
