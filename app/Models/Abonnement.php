<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
     protected $fillable = ['user_id', 'navette_id', 'status'];

    public function navette()
    {
        return $this->belongsTo(Navette::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}