<?php

namespace Database\Seeders;

use App\Models\Favorites_user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Favorites_word;

class Favorites_UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Favorites_user::create([
            'user_id' => 2,
            'other_user_id' => 1,
        ]);
    }
}
