<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;


class PurchasedController extends Controller
{
    function purchased() {
        $trips = Trip::all();
        
        return view('pages.purchased');
    }

}
