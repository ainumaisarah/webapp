<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    public function run()
    {
        DB::table('rooms')->insert([
            ['room_id' => 'A01','type' => 'Single', 'prices' => 100.00, 'maxperson' => 5, 'bed' => 3, 'availability' => true],
            ['room_id' => '30B','type' => 'Double', 'prices' => 150.00, 'maxperson' => 3, 'bed' => 2, 'availability' => true],
            ['room_id' => 'M16','type' => 'Suite', 'prices' => 300.00, 'maxperson' => 2, 'bed' => 1, 'availability' => false],
        ]);
    }
}
