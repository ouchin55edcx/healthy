<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    public function doctor()
    {
        return $this->belongsTo(user::class, 'doctor_id', 'id');
    }

    // Define the relationship with the Patient model
    public function patient()
    {
        return $this->belongsTo(user::class, 'patient_id', 'id');
    }
}
