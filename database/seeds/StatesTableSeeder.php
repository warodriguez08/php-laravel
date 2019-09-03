<?php

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $statuses = array(
        	[
        		'status' => 'Activo'
        	],
        	[
        		'status' => 'Inactivo'
        	]
        );

        foreach($statuses as $value){
        	$status = new Status;
        	$status->status = $value['status'];
        	$status->save();
        }

    }
}
