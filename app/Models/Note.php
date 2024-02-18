<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'iduser');
    }

    public function demande()
    {
        return $this->belongsTo(Demande::class, 'demande_id');
    }
}
