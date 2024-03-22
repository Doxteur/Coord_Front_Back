<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'age',
        'adresse',
        'tel',
        'diagnostic',
        'uuid',
    ];

    public function maladie()
    {
        return $this->belongsTo(Maladies::class);
    }

    public function chambre()
    {
        return $this->belongsTo(Chambres::class);
    }

}
