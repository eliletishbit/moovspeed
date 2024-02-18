<?php

namespace App\Models;
use App\Models\User;
use App\Models\Demande;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gain extends Model
{
    use HasFactory;

     //relation paiement - demande
     public function demande()
     {
     return $this->belongsTo(Demande::class);
     }

      //relation gain - demande
      public function demandegain()
      {
      return $this->belongsTo(Demande::class);
      }

       //relation gain - user
       public function user()
       {
       return $this->belongsTo(User::class);
       }

     
}
