<?php

use Illuminate\Database\Seeder;

class MeasurementTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('measurements')->insert([
            [
                'id' => 1,
                'category_name' => 'Length',
                'parent_id' => null,
                'conversion_coefficient' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'category_name' => 'Kilometer',
                'parent_id' => '1',
                'conversion_coefficient' => 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'category_name' => 'Meter',
                'parent_id' => '1',
                'conversion_coefficient' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'category_name' => 'Decimeter',
                'parent_id' => '1',
                'conversion_coefficient' => 0.1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'category_name' => 'Centimeter',
                'parent_id' => '1',
                'conversion_coefficient' => 0.01,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'category_name' => 'Milimeter',
                'parent_id' => '1',
                'conversion_coefficient' => 0.001,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'category_name' => 'Mass',
                'parent_id' => null,
                'conversion_coefficient' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'category_name' => 'Tonne',
                'parent_id' => 7,
                'conversion_coefficient' => 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'category_name' => 'Kilogram',
                'parent_id' => 7,
                'conversion_coefficient' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'category_name' => 'Decagram',
                'parent_id' => 7,
                'conversion_coefficient' => 0.1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'category_name' => 'Gram',
                'parent_id' => 7,
                'conversion_coefficient' => 0.001,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'category_name' => 'Milligram',
                'parent_id' => 7,
                'conversion_coefficient' => 0.000001,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'category_name' => 'Volume',
                'parent_id' => null,
                'conversion_coefficient' => null ,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'category_name' => 'Cubic meter',
                'parent_id' => 13,
                'conversion_coefficient' => 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'category_name' => 'Litre',
                'parent_id' => 13,
                'conversion_coefficient' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 16,
                'category_name' => 'Cubic centimeter',
                'parent_id' => 13,
                'conversion_coefficient' => 0.001,
                'created_at' => now(),
                'updated_at' => now(),
            ]            
        ]);
    }
}
