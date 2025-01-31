<?php

namespace Database\Factories;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'CustomerName' => $this->faker->name(),
            'Phone' => $this->faker->numerify('##########'), // หมายเลขโทรศัพท์ 10 หลัก (ไม่มีเว้นวรรคหรือสัญลักษณ์)
            'Email' => $this->faker->unique()->safeEmail(),
            'Address' => $this->faker->address(),
        ];
    }
}