<?php

use App\Models\Movie;
use App\Models\User;
use Faker\Factory as faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $faker = Faker::create();

                for ($i = 0; $i < 10; $i++) {
                    $movie = new Movie();
                    $movie->name = $faker->name;
                    $movie->description = $faker->sentence;
                    $movie->user_id =1;
                    $movie->status_id = 1;
                    $movie->save();
                }
    }
}
