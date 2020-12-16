<?php

use Illuminate\Database\Seeder;
use App\Models\Busenos;

class BusenosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Busenos::create(['pavadinimas'=> 'Paimta']);
        Busenos::create(['pavadinimas'=> 'Siunčiama']);
        Busenos::create(['pavadinimas'=> 'Atsiimta']);
        Busenos::create(['pavadinimas'=> 'Įvykdyta']);
    }
}
