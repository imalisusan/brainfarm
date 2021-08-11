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
                'name' => 'Avocado',
                'description' => 'Avocado plants', 
                'lowest_temperature' => '16', 
                'highest_temperature' => '25', 
                'lowest_humidity' => '60', 
                'highest_humidity' => '80', 
                'lowest_atmospheric_pressure' => '0', 
                'highest_atmospheric_pressure' => '2500', 
            ],
            [
                'name' => 'Maize',
                'description' => 'Maize plants', 
                'lowest_temperature' => '18', 
                'highest_temperature' => '23', 
                'lowest_humidity' => '13', 
                'highest_humidity' => '14', 
                'lowest_atmospheric_pressure' => '40000', 
                'highest_atmospheric_pressure' => '6000', 
            ],
            [
                'name' => 'Cabbage',
                'description' => 'Cabbage plants', 
                'lowest_temperature' => '16', 
                'highest_temperature' => '21', 
                'lowest_humidity' => '800', 
                'highest_humidity' => '2200', 
                'lowest_atmospheric_pressure' => '95', 
                'highest_atmospheric_pressure' => '98', 
            ],
            [
                'name' => 'Mango',
                'description' => 'Mango plants', 
                'lowest_temperature' => '27', 
                'highest_temperature' => '36', 
                'lowest_humidity' => '50', 
                'highest_humidity' => '100', 
                'lowest_atmospheric_pressure' => '0', 
                'highest_atmospheric_pressure' => '600', 
            ],
            [
                'name' => 'Cashew Nuts',
                'description' => 'Cashwe Nuts plants', 
                'lowest_temperature' => '24', 
                'highest_temperature' => '28', 
                'lowest_humidity' => '67', 
                'highest_humidity' => '70', 
                'lowest_atmospheric_pressure' => '0', 
                'highest_atmospheric_pressure' => '700', 
            ],
            [
                'name' => 'Cassava',
                'description' => 'Cassava plants', 
                'lowest_temperature' => '25', 
                'highest_temperature' => '29', 
                'lowest_humidity' => '60', 
                'highest_humidity' => '70', 
                'lowest_atmospheric_pressure' => '250', 
                'highest_atmospheric_pressure' => '1500', 
            ],
            [
                'name' => 'Coffee',
                'description' => 'Coffee plants', 
                'lowest_temperature' => '18', 
                'highest_temperature' => '21', 
                'lowest_humidity' => '50', 
                'highest_humidity' => '100', 
                'lowest_atmospheric_pressure' => '1000', 
                'highest_atmospheric_pressure' => '6000', 
            ],
            [
                'name' => 'Rice',
                'description' => 'Rice plants', 
                'lowest_temperature' => '15', 
                'highest_temperature' => '27', 
                'lowest_humidity' => '60', 
                'highest_humidity' => '80', 
                'lowest_atmospheric_pressure' => '60', 
                'highest_atmospheric_pressure' => '3050', 
            ],
            [
                'name' => 'Potato',
                'description' => 'Potato plants', 
                'lowest_temperature' => '15', 
                'highest_temperature' => '20', 
                'lowest_humidity' => '50', 
                'highest_humidity' => '85', 
                'lowest_atmospheric_pressure' => '1600', 
                'highest_atmospheric_pressure' => '3200', 
            ],
            [
                'name' => 'Sweet Potato',
                'description' => 'Sweet Potato plants', 
                'lowest_temperature' => '24', 
                'highest_temperature' => '35', 
                'lowest_humidity' => '85', 
                'highest_humidity' => '90', 
                'lowest_atmospheric_pressure' => '0', 
                'highest_atmospheric_pressure' => '2500', 
            ],
            [
                'name' => 'Tea',
                'description' => 'Tea Leaves', 
                'lowest_temperature' => '13', 
                'highest_temperature' => '21', 
                'lowest_humidity' => '70', 
                'highest_humidity' => '90', 
                'lowest_atmospheric_pressure' => '700', 
                'highest_atmospheric_pressure' => '3000', 
            ],
            [
                'name' => 'Wheat',
                'description' => 'Wheat plants', 
                'lowest_temperature' => '21', 
                'highest_temperature' => '24', 
                'lowest_humidity' => '50', 
                'highest_humidity' => '60', 
                'lowest_atmospheric_pressure' => '1200', 
                'highest_atmospheric_pressure' => '1800', 
            ],
            [
                'name' => 'Tomato',
                'description' => 'Tomato plants', 
                'lowest_temperature' => '19', 
                'highest_temperature' => '27', 
                'lowest_humidity' => '80', 
                'highest_humidity' => '90', 
                'lowest_atmospheric_pressure' => '1500', 
                'highest_atmospheric_pressure' => '3000', 
            ],
            [
                'name' => 'Orange',
                'description' => 'Orange fruits', 
                'lowest_temperature' => '21', 
                'highest_temperature' => '32', 
                'lowest_humidity' => '50', 
                'highest_humidity' => '70', 
                'lowest_atmospheric_pressure' => '0', 
                'highest_atmospheric_pressure' => '2100', 
            ],
            [
                'name' => 'Onion',
                'description' => 'Onion plants', 
                'lowest_temperature' => '13', 
                'highest_temperature' => '35', 
                'lowest_humidity' => '65', 
                'highest_humidity' => '70', 
                'lowest_atmospheric_pressure' => '0', 
                'highest_atmospheric_pressure' => '1900', 
            ],
            [
                'name' => 'Banana',
                'description' => 'Banana plants', 
                'lowest_temperature' => '26', 
                'highest_temperature' => '30', 
                'lowest_humidity' => '65', 
                'highest_humidity' => '90', 
                'lowest_atmospheric_pressure' => '0', 
                'highest_atmospheric_pressure' => '1800', 
            ],
            [
                'name' => 'Peas',
                'description' => 'Peas plants', 
                'lowest_temperature' => '16', 
                'highest_temperature' => '21', 
                'lowest_humidity' => '70', 
                'highest_humidity' => '100', 
                'lowest_atmospheric_pressure' => '750', 
                'highest_atmospheric_pressure' => '5000', 
            ],
            [
                'name' => 'Lemon',
                'description' => 'Lemon plants', 
                'lowest_temperature' => '21', 
                'highest_temperature' => '38', 
                'lowest_humidity' => '50', 
                'highest_humidity' => '100', 
                'lowest_atmospheric_pressure' => '0', 
                'highest_atmospheric_pressure' => '2000', 
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
