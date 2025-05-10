<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class devis extends Model
{
    
    protected $fillable = [
        'idUser',
        'description',
        'cout-estimer',
        
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function devisDetails()
    {
        return $this->hasMany(DevisDetail::class);
    }
}
