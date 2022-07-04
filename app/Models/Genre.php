<?php

namespace App\Models;
use App\Models\Book;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $guarded = [];

        public function book() {
        return $this->hseOne(Book::class);
    }
}
