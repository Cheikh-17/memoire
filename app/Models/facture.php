<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class facture extends Model
{

    protected $fillable = [
        'idUser',
        'nemero-paiement',
        'montant',
        'date-emission',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
}
