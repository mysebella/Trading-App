<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\Package;
use App\Models\Profile;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::create([
            'username' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@hsbglobal.com',
            'password' => Hash::make('hash123'),
            'country' => 'ID',
            'numberPhone' => '08773899012',
            'role' => 'admin'
        ]);

        $user = User::create([
            'username' => 'alinia.meysa',
            'name' => 'Miko Meysa Bima',
            'email' => 'alinia.meysa@gmail.com',
            'password' => Hash::make('Bismillahaman1!'),
            'country' => 'ID',
            'numberPhone' => '087895013427',
            'role' => 'user'
        ]);

        Profile::create(['user_id' => $admin->id]);
        Profile::create(['user_id' => $user->id]);

        collect([['name' => 'Basic', 'min' => 100, 'max' => 999, 'profit' => 1, 'estimasiProfit' => 'Daily', 'contract' => 2,]])
            ->map(function ($package) {
                Package::create($package);
            });

        Bank::create([
            'name' => 'HSB Global Trade',
            'bank' => 'Bank Rakyat Indonesia',
            'noRekening' => '1234567890',
            'image' => '1722698599-bank-Bank Rakyat Indonesia.jpg'
        ]);
    }
}
