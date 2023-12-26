<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Seat;



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

    public function purchasedDelete($id)
{
    $customer = Customer::find($id); // Find the customer by ID

    if (!$customer) {
        return redirect()->back()->with('error', 'Customer not found');
    }

    $trip = $customer->trip; // Retrieve associated trip

    if (!$trip) {
        return redirect()->back()->with('error', 'Trip not found for the customer');
    }

    // Retrieve associated seats
    $seatNumbersString = $customer->seats->pluck('seat_number')->implode(',');

    // Convert the seat numbers string to an array
    $seats = explode(',', $seatNumbersString);

    // Increase available_seats in Trip
    $trip->increment('total_seats', count($seats));

    // Delete seats
    $customer->seats()->delete();

    // Delete customer
    $customer->delete();

    return redirect()->route('bus.purchased-ticket')->with('success', 'Customer and associated seats deleted successfully');
}
}
