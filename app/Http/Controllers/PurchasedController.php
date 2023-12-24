<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Trip;


class PurchasedController extends Controller
{
    function purchased() {
         $trips = Trip::get();
         $customer = Customer::get();
        //$customer = Customer::with('seat', 'seat.trip')->findOrFail($request);

        
        return view('pages.purchased',['customer' => $customer,'trips'=>$trips]);
    }

}
