<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Farmer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Imali Susan',
                'email' => 'imalisusan@gmail.com',
                'phone' => '+254712345678', 
                'address' => 'OTC Hse, 2nd Flr Konza Rd', 
                'password' => '12345678',
                'city' => 'Nairobi',
                'email_verified_at' => '2021-07-31 15:25:08',
            ],
            [
                'name' => 'Maya Bororio',
                'email' => 'mayabororio@gmail.com',
                'phone' => '+254712345678', 
                'address' => 'OTC Hse, 2nd Flr Konza Rd', 
                'password' => '12345678',
                'city' => 'Kisumu',
                'email_verified_at' => '2021-07-31 15:25:08',
            ],
            [
                'name' => 'Susan Lungaho',
                'email' => 'susanimali52@gmail.com',
                'phone' => '+254712345678', 
                'address' => 'OTC Hse, 2nd Flr Konza Rd', 
                'password' => '12345678',
                'city' => 'Mombasa',    
                'email_verified_at' => '2021-07-31 15:25:08',
            ],
        ];

        foreach ($users as $user) {
            $user = User::create([
                   'name' => $user['name'],
                   'email' => $user['email'],
                   'phone' => $user['phone'],
                   'address' => $user['address'],
                   'city' => $user['city'],
                   'password' => Hash::make($user['password']),
                   'email_verified_at' => $user['email_verified_at'],
                 ]);

            $farmer = Farmer::create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'phone' => $user['phone'],
                    'address' => $user['address'],
                    'user_id' => $user->id,
                  ]);
                 
                 $user->attachRole('administrator');
        }
    }
}
