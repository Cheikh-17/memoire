<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ordonnance extends Model
{
    protected $fillable = [
        'idUser',
        'consultation_id',
        'contenu',
        'is_hidden',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'consultation_id');
    }
}
