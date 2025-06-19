<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
   
  protected $fillable = [
        'idUser',
        'idMedecin',
        'diagnostic',
        'motif',
        'date',
        'heure',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function medecin()
    {
        return $this->belongsTo(User::class, 'idMedecin');
    }

    public function traitements()
    {
        return $this->hasMany(traitement::class, 'consultation_id');
    }

    public function ordonnances()
    {
        return $this->hasMany(ordonnance::class, 'consultation_id');
    }

    public function rendezvous()
    {
        return $this->belongsTo(\App\Models\rendezvous::class, 'idUser', 'idUser');
    }
}
