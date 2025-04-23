<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'total_amount',
        'amount_paid',
        'payment_status',
        'issued_date',
    ];

    protected $casts = [
        'issued_date' => 'datetime', // Cast issued_date as a datetime object
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'patient_id');
    }
}
