<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyImage extends Model
{
    protected $guarded = [];

    public function company() 
    {
        return $this->belongsTo(Company::class);
    }
}
