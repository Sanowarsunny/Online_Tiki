<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $fillable = [
        'from',
        'to',
        'paribahan_name',
        'total_seats',
        'journey_date',
        'ticket_price',
        'departure_time',
        'arrival_time',
    ];
    // Define the relationship between Trip and Customer
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
    
}
