<?php

namespace App\Models;

use App\Models\Rent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $guarded = [];

    public function rents() {
        return $this->hasMany(Rent::class);
    }
}
