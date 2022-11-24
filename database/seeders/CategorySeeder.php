<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(array(
            [
                'name' => 'Salud',
            ],
            [
                'name' => 'Alimento',
            ],
            [
                'name' => 'Servicios',
            ],
            [
                'name' => 'Deuda',
            ],
            [
                'name' => 'Préstamo',
            ],
            [
                'name' => 'Caridad',
            ],
            [
                'name' => 'Básico',
            ],
            [
                'name' => 'Lujo',
            ],
            [
                'name' => 'Inversión',
            ],
            [
                'name' => 'Otro',
            ],
        ));
    }
}
