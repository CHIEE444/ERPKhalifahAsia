<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::factory(10)->create()->each(function ($user) {
            Client::factory(5)->create([
                'referral_code' => $user->referral_code,
            ]);

            Lead::factory(5)->create([
                'referral_code' => $user->referral_code,
            ]);
        });
    }
}
