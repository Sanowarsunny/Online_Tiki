<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchasedController extends Controller
{
    function purchased() {
        return view('pages.purchased');
    }
}
