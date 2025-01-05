<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cust_id' => $this->faker->unique()->randomNumber(8),
            'cust_name' => $this->faker->name(),
            'cust_email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'cust_pass' => bcrypt('password'), // password
            'cust_phone' => $this->faker->phoneNumber(),
            'remember_token' => Str::random(10),
        ];
    }
}
