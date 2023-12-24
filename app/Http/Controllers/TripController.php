<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Trip;


class TripController extends Controller
{
    function trip(){
        
        return view('pages.trip');
    }


    function submit_trip(Request $request){
        
        Trip::create($request->all());
       // dd ($request);

        return redirect()->route('bus.all-trip');
    }

    
}
