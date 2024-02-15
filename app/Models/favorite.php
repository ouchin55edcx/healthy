<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    use HasFactory;

    protected $table = 'favorite';

    protected $fillable = [
        'doctor_id',
        'patient_id',
    ];

    // Relationship with Doctor model
    public function doctor()
    {
        return $this->belongsTo(user::class, 'doctor_id');
    }

    // Relationship with Patient model
    public function patient()
    {
        return $this->belongsTo(user::class, 'patient_id');
    }
}
