<?php

namespace Database\Seeders;

use App\Models\Genre;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use Faker\Factory as Faker;

class GenreSeeder extends Seeder
{
    
    public function run()
    {

        Genre::create(['name' => 'Фантастика']);
        Genre::create(['name' => 'Любовни романи']);
        Genre::create(['name' => 'Легенди']);
    }
}
