<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ordonnance extends Model
{
    protected $fillable = [
        'idUser',
        'date-emis',
        'contenu',
         
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
}
