<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navette extends Model
{
    protected $fillable = [
        'societe_id',
        'ville_depart',
        'ville_arrivee',
        'date_debut',
        'date_fin',
        'heure_depart',
        'heure_arrivee',
        'places_disponibles',
        'description',
        'logo'
    ];
    

    public function abonnements()
    {
        return $this->hasMany(Abonnement::class);
    }

    public function societe()
    {
        return $this->belongsTo(Societe::class);
    }
}
