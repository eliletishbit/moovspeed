<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'data', 'read_at', 'message', 'user_id', 'demande_id'];

    // Relation avec la demande
    public function demande()
    {
        return $this->belongsTo(Demande::class, 'demande_id');
    }
}
