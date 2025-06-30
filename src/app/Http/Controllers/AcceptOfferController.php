<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class AcceptOfferController extends Controller
{
    public function __invoke(Offer $offer)
    {
        $offer->update(["accepted_at" => now()]);

        $offer->car->sold_at = now();
        $offer->car->save();

        $offer->car->offers()
            ->except($offer)
            ->update(["declined_at" => now()]);

        return;
    }
}
