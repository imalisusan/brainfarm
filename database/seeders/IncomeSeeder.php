<?php

namespace Database\Seeders;

use App\Models\Income;
use Illuminate\Database\Seeder;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $incomes = [
            [
                'date' => '2021-07-31',
                'amount' => '100000', 
                'description' => 'Received cash from the government', 
                'farmer_id' => '1',
            ],

            [
                'date' => '2021-07-31',
                'amount' => '6000', 
                'description' => 'Received cash from the government', 
                'farmer_id' => '1',
            ],

         
        ];

        foreach ($incomes as $income) {
            $income = Income::create([
                   'date' => $income['date'],
                   'amount' => $income['amount'],
                   'description' => $income['description'],
                   'farmer_id' => $income['farmer_id'],
                 ]);
        }
    }
}
