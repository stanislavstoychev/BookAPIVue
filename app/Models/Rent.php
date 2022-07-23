<?php

namespace App\Models;

use App\Models\Subscriber;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rent extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function subscriber() {
        return $this->belongsTo(Subscriber::class);
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }
}
