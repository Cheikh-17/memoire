<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class facture extends Model
{

    protected $fillable = [
        'idUser',
        'montant',
        'date-emission',
        'consultation_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function consultation()
    {
        return $this->belongsTo(\App\Models\Consultation::class, 'consultation_id');
    }
}
