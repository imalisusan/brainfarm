<?php

namespace Database\Seeders;
use App\Models\County;
use Illuminate\Database\Seeder;

class CountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $counties = 
        [
            [
                'id' => '47',
                'name' => 'Nairobi',
            ],
            [
                'id' => '42',
                'name' => 'Kisumu',
            ],
            [
                'id' => '32',
                'name' => 'Nakuru',
            ],
            [
                'id' => '27',
                'name' => 'Uasin Gishu',
            ],
        ];
        
        foreach ($counties as $county) {
            $county = County::create([
                   'id' => $county['id'],
                   'name' => $county['name'],
                 ]);
        }
    }
}
