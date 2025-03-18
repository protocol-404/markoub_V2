<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Societe extends Model
{
    use HasFactory; 

    protected $fillable = ['nom', 'adresse', 'ville', 'code_postal', 'pays', 'siret', 'email', 'telephone', 'logo'];
    
    public function navette(){
        return $this->hasMany(Navette::class);
    }
}
