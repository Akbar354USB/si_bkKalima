<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sanksis')->insert([
            ['id_sanksi' => 1, 'sanksi' => 's1'],
            ['id_sanksi' => 2, 'sanksi' => 's2'],
            ['id_sanksi' => 3, 'sanksi' => 's3'],
        ]);
    }
}
