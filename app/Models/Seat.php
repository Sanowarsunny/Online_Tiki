<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','trip_id', 'seat_number'];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
