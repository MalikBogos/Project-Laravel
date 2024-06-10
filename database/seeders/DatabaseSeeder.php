<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'test',
            'email' => 'test@ehb.be',
            'password' => Hash::make('test12345'),
            'admin' => false,
        ]);


        $this->call([
            AdminUserSeeder::class,
            FaqSeeder::class,
        ]);


        
    }
}
