<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Seat;
use App\Models\Trip;

use Illuminate\Http\Request;

class BusTicketController extends Controller
{
    
    function buy(Request $request){
        $busCode = $request->input('bus_code');
        $paribahanName = $request->input('paribahan_name');
        $availableSeats = $request->input('available_seats');
        return view('pages.buy',compact('paribahanName','availableSeats','busCode'));
    }
   

    public function submit_buy(Request $request) {
        // Store customer information
        $busCode = $request->query('busCode');
        $customer = Customer::create([
            'customer_name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'trip_id' => $busCode,
        ]);
    
        // Update total seats in the trip
        $trip = Trip::find($busCode);
    
        // Check if the trip and selected seats exist
        if ($trip && $selectedSeatNumbers = $request->input('seat_numbers')) {
            // Calculate the number of selected seats
            $selectedSeatsCount = count($selectedSeatNumbers);
    
            // Update the total seats in the trip
            $trip->total_seats -= $selectedSeatsCount;
            $trip->save();
    
            // Store selected seat numbers
            foreach ($selectedSeatNumbers as $seatNumber) {
                Seat::create([
                    'customer_id' => $customer->id,
                    'seat_number' => $seatNumber,
                    'trip_id' => $busCode,
                ]);
            }
        }
        
    
        // Redirect or return the appropriate response
        return redirect()->route('bus.purchased-ticket');
    }
}
