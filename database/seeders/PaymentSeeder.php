<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        DB::table('payments')->insert([
            ['payment_id' =>214,'booking_id' => 'A445', 'amount' => 500.00, 'card_name' => 'a', 'card_number' =>11111.222, 'expiry_date' => 12.2, 'ccv' => 1.02, 'payment_status' => 'success'],
            ['payment_id' => 616,'booking_id' => 'ABC1234', 'amount' => 300.00, 'card_name' => 'b', 'card_number' =>2222.111, 'expiry_date' => 10.2, 'ccv' => 3.01, 'payment_status' => 'fail'],
        ]);
    }
}
