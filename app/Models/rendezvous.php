<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rendezvous extends Model
{
    protected $table = 'rendezvous';

    protected $fillable = [
        'idUser',
        'idMedecin',
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
        return $this->belongsTo(\App\Models\medecin::class, 'idMedecin');
    }
}
