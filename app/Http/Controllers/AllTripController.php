<?php

namespace App\Http\Controllers;

use App\Models\Trip;


class AllTripController extends Controller
{
    function all_trip() {
        $trips = Trip::all();
        
        return view('pages.all_trip',['trips' => $trips]);
    }

    public function deleteTrip($id)
{
    $trip = Trip::find($id); // Find the trip by ID

    if (!$trip) {
        return redirect()->back()->with('error', 'Trip not found');
    }

    $trip->delete(); // Delete the trip

    return redirect()->route('bus.all-trip')->with('success', 'Trip deleted successfully');
}
}
