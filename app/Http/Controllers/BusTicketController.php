<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Seat;
use Illuminate\Http\Request;

class BusTicketController extends Controller
{
    //
    function buy(){
        return view('pages.buy');
    }

    function submit_buy(Request $request) {
        // Store customer information
        $customer = Customer::create([
            'customer_name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone_number'),
        ]);

        // Store selected seat numbers
        $selectedSeatNumbers = $request->input('seat_numbers');
        foreach ($selectedSeatNumbers as $seatNumber) {
            Seat::create([
                'customer_id' => $customer->id,
                'seat_number' => $seatNumber,
            ]);
        }
        return redirect()->route('bus.purchased-ticket');
    }

}
