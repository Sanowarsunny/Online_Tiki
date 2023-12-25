<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Trip;


class PurchasedController extends Controller
{
    function purchased() {

        //$customerId = $request->query('customer_id');

         //$trips = Trip::all();
         $customers = Customer::with('trip','seats')
                    ->orderBy('created_at', 'desc')
                    ->get();
        //$customer = Customer::with('seat', 'seat.trip')->findOrFail($request);

        //$customer = Customer::with('trip','seat')->find($customerId);

        // Check if the trip exists
        if ($customers) {
            // Pass the trip details to the view
            return view('pages.purchased', compact('customers'));
        } else {
            // Handle the case when the trip does not exist
            return redirect()->route('error.page');
        }
        //return view('pages.purchased',['customer' => $customer,'trips'=>$trips]);
    }

}
