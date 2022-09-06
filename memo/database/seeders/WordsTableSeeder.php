<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\word;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 6; $i<10; $i++){
            word::create([
                'id' => $i,
                'user_id' => 1,
                'reading' => Str::random(5),
                'phrases' => Str::random(10),
                'meaning' => Str::random(10),
            ]);
        }
    }
}
