<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\UserStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserStatus::create([
            'uuid'          => Str::uuid(),
            'name'          => 'Aktif',
            'slug'          => 'aktif.html',
            'color'         => 'success',
        ]);

        UserStatus::create([
            'uuid'          => Str::uuid(),
            'name'          => 'Tidak Aktif',
            'slug'          => 'tidak-aktif.html',
            'color'         => 'secondary',
        ]);
    }
}
