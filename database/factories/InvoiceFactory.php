<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    protected $model = \App\Models\Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Get a random patient_id or use a fallback value
        $patient = Patient::inRandomOrder()->first();

        return [
            'patient_id' => $patient ? $patient->patient_id : 'OH0001', // Fallback to 'OH0001' if no patients exist
            'total_amount' => $this->faker->numberBetween(1000, 5000),
            'amount_paid' => $this->faker->numberBetween(500, 4000),
            'payment_status' => $this->faker->randomElement(['paid', 'pending']),
            'issued_date' => $this->faker->dateTimeThisYear(),
        ];
    }
}
