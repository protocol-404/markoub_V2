<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    protected $fillable = ['nom', 'prenom', 'email', 'telephone', 'adresse', 'ville', 'code_postal', 'pays', 'message'];
    
    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
