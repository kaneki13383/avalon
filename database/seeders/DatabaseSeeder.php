<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Product::factory(4)->create();

        User::create([
            'login' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => Hash::make('12345678'),
            'name' => 'admin',
            'surname' => 'admin',
            'role' => 1
        ]);

        User::create([
            'login' => 'qwerty1',
            'email' => 'qwerty1@mail.ru',
            'password' => Hash::make('12345678'),
            'name' => 'Иван',
            'surname' => 'Иванов',
        ]);
        User::create([
            'login' => 'qwerty2',
            'email' => 'qwerty2@mail.ru',
            'password' => Hash::make('12345678'),
            'name' => 'Иван',
            'surname' => 'Иванов',
        ]);
        User::create([
            'login' => 'qwerty3',
            'email' => 'qwerty3@mail.ru',
            'password' => Hash::make('12345678'),
            'name' => 'Иван',
            'surname' => 'Иванов',
        ]);
        User::create([
            'login' => 'qwerty4',
            'email' => 'qwerty4@mail.ru',
            'password' => Hash::make('12345678'),
            'name' => 'Иван',
            'surname' => 'Иванов',
        ]);
    }
}
