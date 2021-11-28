<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Race;
use App\Models\Animal;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'tipe' => 2
        ]);
        
        Race::create([
            'name' => 'Kampung',
            'slug' => 'kampung'
        ]);

        Race::create([
            'name' => 'Persia',
            'slug' => 'persia'
        ]);

        Race::create([
            'name' => 'Anggora',
            'slug' => 'anggora'
        ]);

        Animal::create([
            'name' => 'Kucing',
            'slug' => 'kucing'
        ]);

        Animal::create([
            'name' => 'Anjing',
            'slug' => 'anjing'
        ]);

        Animal::create([
            'name' => 'Burung',
            'slug' => 'burung'
        ]);

        Animal::create([
            'name' => 'Ular',
            'slug' => 'ular'
        ]);

        Animal::create([
            'name' => 'Musang',
            'slug' => 'musang'
        ]);
        User::factory(3)->create();
        
    }
}
