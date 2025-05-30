<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class traitement extends Model
{
    protected $fillable = [
        'consultation_id',
        'date',
        'heure',
        'observation',
        'description',
        'is_hidden',
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'consultation_id');
    }
}
