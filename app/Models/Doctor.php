<?php

namespace App\Models;
use App\Models\Medicament;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function medicaments()
    {
        return $this->hasMany(Medicament::class);
    }
}
