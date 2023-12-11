<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        $this->call([
            
            UsersTableSeeder::class,
            RolesSeeder::class,
            UsersRolTableSeeder::class,
            PermisoTableSeeder::class,
            PermisoRolTableSeeder::class,
            MenuTableSeeder::class,
           

        ]);
       


       


    }
}
