<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','trip_id','bus_name', 'seat_number','total_price'];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
