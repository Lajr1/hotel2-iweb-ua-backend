<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{

    public function run()
    {
        $oferta1 = new Offer();
        $oferta1->name = "5%";
        $oferta1->discount = 5;
        $oferta1->save();

        $oferta2 = new Offer();
        $oferta2->name = "10%";
        $oferta2->discount = 10;
        $oferta2->save();

        $oferta3 = new Offer();
        $oferta3->name = "15%";
        $oferta3->discount = 15;
        $oferta3->save();
    }
}
