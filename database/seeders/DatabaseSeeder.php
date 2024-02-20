<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Teacher;
use App\Models\User;
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
        Admin::create([
            'name' => 'admin',
            'email' => 'admin@example.org',
            'password' => bcrypt('admin'),
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@example.org',
            'password' => bcrypt('user'),
        ]);

        Teacher::create([
            'name' => 'guru',
            'email' => 'guru@example.org',
            'password' => bcrypt('guru'),
        ]);
    }
}
