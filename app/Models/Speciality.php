<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;

    protected $table = 'specialities';
    protected $fillable = ['specialtyName'];

    public function user()
    {

        return $this->belongsTo(User::class);
    }
    public function medicaments()
    {
        return $this->hasMany(Medicament::class);
    }
}
