<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::create([
            'name'  => 'Umaedi',
            'email' => 'admin@gmail.com',
            'password'  => bcrypt('12345678')
        ]);
        \App\Models\Mahasiswa::factory(20)->create();
    }
}
