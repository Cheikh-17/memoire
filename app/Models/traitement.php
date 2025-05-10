<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class traitement extends Model
{
    protected $fillable = [
        'idUser',
        'date',
        'heure',
        'observation',
        'description',
    
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function ordonnance()
    {
        return $this->hasMany(ordonnance::class);
    }
}
