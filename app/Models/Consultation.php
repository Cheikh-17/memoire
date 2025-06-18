<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\medecin; // Correction import classe medecin

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
        return $this->belongsTo(medecin::class, 'idMedecin');
    }

    public function traitements()
    {
        return $this->hasMany(traitement::class, 'consultation_id');
    }

    public function ordonnances()
    {
        return $this->hasMany(ordonnance::class, 'consultation_id');
    }
}
    