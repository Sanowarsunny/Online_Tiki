<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Seat;
use App\Models\Trip;

use Illuminate\Http\Request;

class BusTicketController extends Controller
{
    
    public function buy(Request $request){
        $busCode = $request->input('bus_code');
        $paribahanName = $request->input('paribahan_name');
        $availableSeats = $request->input('available_seats');
        // Find the trip based on busCode
        $id = $busCode;
        $trip = Trip::find($id)->all();

        // Get the seat numbers for the given trip
        // $seatNumbers = Seat::where('trip_id', $busCode)->pluck('seat_number')->toArray();
        // Get the seat numbers as a comma-separated string
        $seatNumbersString = Seat::where('trip_id', $busCode)->pluck('seat_number')->implode(',');

        // Convert the seat numbers string to an array
        $seatNumbers = explode(',', $seatNumbersString);
        //dd($seatNumbers);
        // // If trip not found or no seats available, show an error or redirect
        // if (!$trip || $trip->available_seats <= 0) {
        //     // Handle the case where the trip or seats are not available
        //     return view('pages.buy',compact('paribahanName','availableSeats','busCode'));
        // }
    
        
        return view('pages.buy',compact('paribahanName','availableSeats','busCode','seatNumbers'));
    }
    // public function buy(Request $request) {
    //     $busCode = $request->query('busCode');
    //     $paribahanName = $request->input('paribahan_name');
    //     $availableSeats = $request->input('available_seats');
    
    //     // Find the trip based on busCode
    //     $trip = Trip::find($busCode);
    
    //     // If trip not found or no seats available, show an error or redirect
    //     if (!$trip || $trip->available_seats <= 0) {
    //         // Handle the case where the trip or seats are not available
    //         return view('pages.buy')->with('error', 'Trip not available or no seats left.');
    //     }
    
    //     // Get the seat numbers for the given trip
    //     $seatNumbers = Seat::where('trip_id', $busCode)->pluck('seat_number')->toArray();
    
    //     // Pass the data to the view
    //     return view('pages.buy', compact('paribahanName', 'availableSeats', 'busCode', 'seatNumbers'));
    // }

    public function submit_buy(Request $request) {
        
        // // Store customer information
        // $busCode = $request->query('busCode');
        // $customer = Customer::create([
        //     'customer_name' => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'phone' => $request->input('phone'),
        //     'trip_id' => $busCode,
        // ]);
    
        // // Update total seats in the trip
        // $trip = Trip::find($busCode);
    
        // // Check if the trip and selected seats exist
        // if ($trip && $selectedSeatNumbers = $request->input('seat_numbers')) {
        //     // Calculate the number of selected seats
        //     $selectedSeatsCount = count($selectedSeatNumbers);
    
        //     // Update the total seats in the trip
        //     $trip->total_seats -= $selectedSeatsCount;
        //     $trip->save();
    
        //     // Store selected seat numbers
        //     foreach ($selectedSeatNumbers as $seatNumber) {
        //         Seat::create([
        //             'customer_id' => $customer->id,
        //             'seat_number' => $seatNumber,
        //             'trip_id' => $busCode,
        //         ]);
        //     }
        // }
        

    // Store customer information
    $busCode = $request->query('busCode');
    $customer = Customer::create([
        'customer_name' => $request->input('name'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'trip_id' => $busCode,
    ]);

    // Store selected seat numbers as an array
    $selectedSeatNumbers = $request->input('seat_numbers');
    $selectedSeatsArray = [];
    
    foreach ($selectedSeatNumbers as $seatNumber) {
        $selectedSeatsArray[] = $seatNumber;
    }

    // Convert the array to a comma-separated string
    $seatNumbersString = implode(',', $selectedSeatsArray);

    //$paribahanName = Trip::where('id', $busCode)->value('paribahan_name');
    // Calculate total price (assuming you have a ticket_price column in your Trip model)
    $trip = Trip::find($busCode);
    $totalSeats = count($selectedSeatNumbers);
    $ticketPrice = $trip->ticket_price;
    $totalPrice = $totalSeats * $ticketPrice;
    //find bus name 
    $trip = Trip::where('id', $busCode)->pluck('paribahan_name')->first();
    $paribahanName = $trip;
    Seat::create([
        'customer_id' => $customer->id,
        'trip_id' => $busCode,
        'bus_name' => $paribahanName,
        'seat_number' => $seatNumbersString,
        'total_price'=>$totalPrice,
    ]);

    // Update the total seats in the trip table
    $trip = Trip::find($busCode);
    $trip->decrement('total_seats', count($selectedSeatNumbers));

        
    
        // Redirect or return the appropriate response
        return redirect()->route('bus.purchased-ticket');
    }
}
