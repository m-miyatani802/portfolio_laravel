<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mylists')->insert([
            'user_id' => 1,
            'name' => 'test'
        ]);

        DB::table('mylists')->insert([
            'user_id' => 1,
            'name' => 'test2'
        ]);

    }
}
