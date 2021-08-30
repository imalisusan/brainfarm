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
                'created_at'=> '2021-06-30 08:36:13'
            ],

            [
                'type' => 'Plough',
                'date' => '2021-07-31',
                'amount' => '20000', 
                'description' => 'Bought a Plough for the farm', 
                'farmer_id' => '1',
                'created_at'=> '2021-07-30 08:36:13'
            ],

            [
                'type' => 'Tractor',
                'date' => '2021-07-31',
                'amount' => '250000', 
                'description' => 'Bought a plough', 
                'farmer_id' => '1',
                'created_at'=> '2021-05-30 08:36:13'
            ],
        ];

        foreach ($expenditures as $expenditure) {
            $expenditure = Expenditure::create([
                   'type' => $expenditure['type'],
                   'date' => $expenditure['date'],
                   'amount' => $expenditure['amount'],
                   'description' => $expenditure['description'],
                   'farmer_id' => $expenditure['farmer_id'],
                   'created_at' => $expenditure['created_at'],
                 ]);
        }
    }
    
}