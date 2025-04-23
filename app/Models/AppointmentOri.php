<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentOri extends Model
{
    use HasFactory;

    protected $table = 'appointmentsori';

    protected $fillable = [
        'patient_name',
        'email',
        'appointment_date',
        'departement',
        'phone',
        'message',
    ];
}