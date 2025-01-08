<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        DB::table('payments')->insert([
            ['booking_id' => 1, 'amount' => 500, 'payment_status' => 'paid'],
            ['booking_id' => 2, 'amount' => 300, 'payment_status' => 'unpaid'],
        ]);
    }
}
