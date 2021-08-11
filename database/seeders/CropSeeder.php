<?php

namespace Database\Seeders;

use App\Models\Crop;
use Illuminate\Database\Seeder;

class CropSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $crops = [
            [
                'name' => 'Maize',
                'description' => 'Maize plants', 
                'lowest_temperature' => '12', 
                'highest_temperature' => '12', 
                'lowest_humidity' => '12', 
                'highest_humidity' => '12', 
                'lowest_atmospheric_pressure' => '12', 
                'highest_atmospheric_pressure' => '12', 
            ],
            [
                'name' => 'Maize',
                'description' => 'Maize plants', 
                'lowest_temperature' => '12', 
                'highest_temperature' => '12', 
                'lowest_humidity' => '12', 
                'highest_humidity' => '12', 
                'lowest_atmospheric_pressure' => '12', 
                'highest_atmospheric_pressure' => '12', 
            ],
            [
                'name' => 'Maize',
                'description' => 'Maize plants', 
                'lowest_temperature' => '12', 
                'highest_temperature' => '12', 
                'lowest_humidity' => '12', 
                'highest_humidity' => '12', 
                'lowest_atmospheric_pressure' => '12', 
                'highest_atmospheric_pressure' => '12', 
            ],
            [
                'name' => 'Maize',
                'description' => 'Maize plants', 
                'lowest_temperature' => '12', 
                'highest_temperature' => '12', 
                'lowest_humidity' => '12', 
                'highest_humidity' => '12', 
                'lowest_atmospheric_pressure' => '12', 
                'highest_atmospheric_pressure' => '12', 
            ],



         
        ];

        foreach ($crops as $crop) {
            $crop = Crop::create([
                   'name' => $crop['name'],
                   'description' => $crop['description'],
                   'lowest_temperature' => $crop['lowest_temperature'],
                   'highest_temperature' => $crop['highest_temperature'],
                   'lowest_humidity' => $crop['lowest_humidity'],
                   'highest_humidity' => $crop['highest_humidity'],
                   'lowest_atmospheric_pressure' => $crop['lowest_atmospheric_pressure'],
                   'highest_atmospheric_pressure' => $crop['highest_atmospheric_pressure'],
                 ]);
        }
    }
}
