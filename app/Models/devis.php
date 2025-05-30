<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class devis extends Model
{
    
    protected $fillable = [
        'idUser',
        'description',
        'cout_estimer',
        
    ];

    public function client()
    {
        return $this->belongsTo(User::class);
    }

    public function devisDetails()
    {
        return $this->hasMany(self::class);
    }
}
