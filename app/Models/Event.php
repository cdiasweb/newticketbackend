<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function customer() 
    {
        $this->belongsTo(Customer::class);
    }

    public function tickets()
    {
        $this->hasMany(Ticket::class);
    }
}
