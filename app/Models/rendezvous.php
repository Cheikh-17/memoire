<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rendezvous extends Model
{
    
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

    public function medecin()
    {
        return $this->belongsTo(Medecin::class, 'idMedecin');
    }
}
