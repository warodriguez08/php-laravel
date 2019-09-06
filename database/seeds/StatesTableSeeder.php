<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

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
            ], [
                'status' => 'Inactivo'
            ],
            [
                'status' => 'Pendiente'
            ], [
                'status' => 'Rechazado'
            ], [
                'status' => 'Cancelado'
            ], [
                'status' => 'Exitoso'
            ], [
                'status' => 'Validado'
            ],
            [
                'status' => 'Inactivo'
            ], [
                'status' => 'Visto'
            ], [
                'status' => 'No visto'
            ]
        );

        foreach ($statuses as $value) {

            $status = new Status();
            $status->status = $value['status'];
            $status->save();
        }
    }
}
