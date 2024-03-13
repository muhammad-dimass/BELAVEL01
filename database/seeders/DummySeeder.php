<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=2500; $i < 10000 ; $i++) { 
            // code...
            User::create([
            'name'   => 'user ke'.$i,
            'email'  => 'user'.$i.'@gmail.com',
            'password'  => Hash::make('password'),
        ]);
        }

        
    }
}
