<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
   
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([           
            'username'  => 'lparejo',
            'names' => 'Luis',
            'surnames' => 'Parejo Diaz',
            'email'  => 'parejo1962@hotmail.com',
            'password' => bcrypt('Emma*2024'),
            'status' => true,            
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('users')->insert([           
            'username'  => 'rcampelo',
            'names' => 'Roberto',
            'surnames' => 'Campelo',
            'email'  => 'rcampelo@lagiralda.com.ve',
            'password' => bcrypt('Lg*2024'),
            'status' => true,            
            'created_at' => now(),
            'updated_at' => now()
        ]);   
    }
}
