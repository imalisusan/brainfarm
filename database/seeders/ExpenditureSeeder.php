<?php

namespace Database\Seeders;

use App\Models\Expenditure;
use Illuminate\Database\Seeder;

class ExpenditureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expenditures = [
            [
                'type' => 'Manure',
                'date' => '2021-07-31',
                'amount' => '19000', 
                'description' => 'Bought Manure for the farm', 
                'farmer_id' => '1',
            ],

            [
                'type' => 'Manure',
                'date' => '2021-07-31',
                'amount' => '20000', 
                'description' => 'Bought Manure for the farm', 
                'farmer_id' => '1',
            ],

            [
                'type' => 'Plough',
                'date' => '2021-07-31',
                'amount' => '19000', 
                'description' => 'Bought a plough', 
                'farmer_id' => '1',
            ],
        ];

        foreach ($expenditures as $expenditure) {
            $expenditure = Expenditure::create([
                   'type' => $expenditure['type'],
                   'date' => $expenditure['date'],
                   'amount' => $expenditure['amount'],
                   'description' => $expenditure['description'],
                   'farmer_id' => $expenditure['farmer_id'],
                 ]);
        }
    }
    
}