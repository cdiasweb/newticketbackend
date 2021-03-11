<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    public function customers() 
    {
        return $this->hasMany(Customer::class);
    }

    public function images() 
    {
        return $this->hasMany(CompanyImage::class);
    }
}
