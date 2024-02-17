<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
    
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
    
    public function hour()
    {
        return $this->belongsTo(AvailableHour::class, 'hour_id');
    }
    // Appointment.php



}
