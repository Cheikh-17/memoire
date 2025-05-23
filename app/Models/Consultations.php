<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
   
  protected $fillable = [
        'idUser',
        'diagnostic',
        'motif',
        'date',
    ];

     public function patient()
    {
        return $this->belongsTo(User::class);
    }

    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }
}
    