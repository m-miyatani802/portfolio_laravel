<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\word;


class Words2TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 20; $i++) {
            $param = [
                'id' => $i,
                'user_id' => 1,
                'reading' => Str::random(5),
                'phrases' => Str::random(10),
                'meaning' => Str::random(10),
            ];
            DB::table('words2')->insert($param);
        }
    }
}
