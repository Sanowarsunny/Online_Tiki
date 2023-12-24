<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Trip;


class TripController extends Controller
{
    function trip(){
        
        return view('pages.trip');
    }

    function all_trip() {

        $trips = Trip::orderBy('created_at', 'desc')->paginate(10);

        return view('pages.all_trip', compact('trips'));
        //return view('pages.all_trip');
    }

    function submit_trip(Request $request){
        
        Trip::create($request->all());
       // dd ($request);

        return redirect()->route('bus.all-trip');
    }

    
}
