<?php

namespace Database\Seeders;

use App\Models\admin;
use App\Models\teacher;
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
        admin::create([
            'name' => 'admin',
            'email' => 'admin@example.org',
            'password' => bcrypt('admin'),
        ]);
    }
}
