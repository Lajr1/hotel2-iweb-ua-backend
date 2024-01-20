<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{

    public function run()
    {
        $servicio1 = new Service();
        $servicio1->title = "Cama supletoria";
        $servicio1->description = "Se añade una cama supletoria a la habitación reservada.";
        $servicio1->price = 0;
        $servicio1->save();

        $servicio2 = new Service();
        $servicio2->title = "Desayuno";
        $servicio2->description = "Desayuno en el hotel.";
        $servicio2->price = 10.2;
        $servicio2->save();

        $servicio3 = new Service();
        $servicio3->title = "Cena";
        $servicio3->description = "Cena en el hotel.";
        $servicio3->price = 15;
        $servicio3->save();
    }
}
