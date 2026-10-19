<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@inaki.or.id'],
            [
                'name' => 'Administrator INAKI',
                'password' => Hash::make('InakiAdmin2026!'),
                'role' => 'admin',
                'phone' => '+62 811-972-8888',
                'avatar' => null,
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}
