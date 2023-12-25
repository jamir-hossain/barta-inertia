<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()
            ->count(10)
            ->state(new Sequence(
                function (Sequence $sequence) {
                    return ['email' => 'user' . ($sequence->index + 1) . '@gmail.com'];
                },
            ))
            ->create();
    }
}
