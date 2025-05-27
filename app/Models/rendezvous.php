<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rendezvous extends Model
{
    protected $table = 'rendezvous';

    protected $fillable = [
        'idUser',
        'date-rendez-vous',
        'heure-rendez-vous',
        'type-de-soins',
        'status',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    // Suppression de la relation medecin() car la colonne idMedecin n'existe pas
}
