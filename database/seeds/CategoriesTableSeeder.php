<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array(
            [
                'name' => 'Terror',
                'status_id' => 1
            ], [
                'name' => 'Accion',
                'status_id' => 2
            ],
            [
                'name' => 'Romance',
                'status_id' => 3
            ], [
                'name' => 'Comedia',
                'status_id' => 4
            ], [
                'name' => 'Suspenso',
                'status_id' => 5
            ], [
                'name' => 'Negocios',
                'status_id' => 6
            ], [
                'name' => 'Documental',
                'status_id' => 7
            ],
            [
                'name' => 'Basado en vida real',
                'status_id' => 8
            ], [
                'name' => 'Historico',
                'status_id' => 9
            ], [
                'name' => 'Religioso',
                'status_id' => 10
            ]
        );

        foreach ($categories as $cat) {

            $category = new Category();
            $category->name = $cat['name'];
            $category->status_id = $cat['status_id'];
            $category->save();
        }
    }
}
