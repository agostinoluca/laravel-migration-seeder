<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Train;

class PageController extends Controller
{

    public function index()
    {
        $trains = Train::all();
        // dd($trains);

        return view('home', compact('trains'));
    }

    public function filter()
    {
        $trainsToday = Train::whereDate('travel_date', now()->toDateString())->get();

        return view('departure_of_today', compact('trainsToday'));
    }
}
