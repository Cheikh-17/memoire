<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class medecin extends Model
{
    
    protected $fillable = [
        'idUser',
        'specialite',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function rendezVous()
    {
        return $this->hasMany(RendezVous::class);
    }
    
}
