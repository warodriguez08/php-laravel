<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        for($i=0; $i<10;$i++){
        	$user = new User;
        	$user->name = $faker->name;
        	$user->email = $faker->email;
        	$user->password = Hash::make('test123');
        	$user->status_id = 1;
            $user->role = $faker->randomElement(array ('Admin','User'));
        	$user->save();
        }
    }
}
