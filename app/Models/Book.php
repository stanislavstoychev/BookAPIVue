<?php

namespace App\Models;
use App\Models\Rent;
use App\Models\Genre;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function genre() {
        return $this->belongsTo(Genre::class);
    }
    public function rents() {
        return $this->hasMany(Rent::class);
    }
}
