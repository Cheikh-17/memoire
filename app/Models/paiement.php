<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class paiement extends Model
{
    protected $fillable = [
        'idUser',
        'numero-paiement',
        'date-paiement',
        'montant',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function facture()
    {
        return $this->hasMany(Facture::class);
    }
}
