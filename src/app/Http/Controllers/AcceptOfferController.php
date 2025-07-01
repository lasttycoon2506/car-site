<?php

namespace App\Http\Controllers;

use App\Models\Offer;

class AcceptOfferController extends Controller
{
    public function __invoke(Offer $offer)
    {
        $car = $offer->car;
        $this->authorize("update", $car);

        $offer->update(["accepted_at" => now()]);

        $car->sold_at = now();
        $car->save();

        $car->offers()
            ->except($offer)
            ->update(["declined_at" => now()]);

        return;
    }
}
