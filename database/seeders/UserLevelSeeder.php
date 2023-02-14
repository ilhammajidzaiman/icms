<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\UserLevel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserLevel::create([
            'uuid'          => Str::uuid(),
            'name'          => 'Super Admin',
            'slug'          => 'super-admin.html',
        ]);

        UserLevel::create([
            'uuid'          => Str::uuid(),
            'name'          => 'Admin',
            'slug'          => 'admin.html',
        ]);

        UserLevel::create([
            'uuid'          => Str::uuid(),
            'name'          => 'User',
            'slug'          => 'user.html',
        ]);
    }
}