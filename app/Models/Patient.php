<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'date_of_birth',
        'phone',
        'email',
        'address',
        'patient_id',
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'patient_id', 'patient_id');
    }
}
