<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class AcceptOfferController extends Controller
{
    public function __invoke(Request $request, Offer $offer)
    {

        $offer->update(["accepted_at" => now()]);

        $try = $offer->car()->offers()->except();
        dd($try);
    }
}
