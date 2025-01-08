<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    public function run()
    {
        DB::table('rooms')->insert([
            ['room_id' => 'A01','type' => 'Single', 'prices' => 100, 'availability' => true],
            ['room_id' => '30B','type' => 'Double', 'prices' => 150, 'availability' => true],
            ['room_id' => 'M16','type' => 'Suite', 'prices' => 300, 'availability' => false],
        ]);
    }
}
