<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    //relation paiement - demande
    public function demande()
    {
    return $this->belongsTo(Demande::class);
    }

    //relation paiement-user
     // Définir la relation avec User
     public function user()
     {
         return $this->belongsTo(User::class, 'iduser');
     }

}
