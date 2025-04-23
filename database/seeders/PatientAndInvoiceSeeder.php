<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use App\Models\Invoice;

class PatientAndInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed 5 patients
        $patients = Patient::factory()->count(5)->create();

        // Seed invoices for each patient
        foreach ($patients as $patient) {
            Invoice::create([
                'patient_id' => $patient->patient_id,
                'total_amount' => rand(1000, 5000), // Random total amount
                'amount_paid' => rand(500, 4000), // Random amount paid
                'payment_status' => rand(0, 1) ? 'paid' : 'pending', // Random payment status
                'issued_date' => now(),
            ]);
        }
    }
}
