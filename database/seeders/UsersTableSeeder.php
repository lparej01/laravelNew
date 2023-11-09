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
            'password' => bcrypt('Emma*2023'),
            'status' => true,            
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('users')->insert([           
            'username'  => 'lparej01',
            'names' => 'Jose',
            'surnames' => 'Parejo Diaz',
            'email'  => 'parejo1962@gmail.com',
            'password' => bcrypt('Emma*2022'),
            'status' => true,            
            'created_at' => now(),
            'updated_at' => now()
        ]);   
    }
}
