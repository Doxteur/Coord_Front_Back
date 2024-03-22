<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambres extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'etage',
        'nb_lits',
        'nb_lits_occupes',
    ];

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

}
