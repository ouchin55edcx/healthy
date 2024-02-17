<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;

    protected $fillable = ['medicamentName', 'speciality_id'];

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }
}

