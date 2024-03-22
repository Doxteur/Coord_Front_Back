<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maladies extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'categorie',
        'gravite',
        'autres',
    ];

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

}
