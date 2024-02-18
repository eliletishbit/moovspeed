<?php

namespace App\Models;
use App\Models\Typevoiture;
use App\Models\Notification;
use App\Models\Demande;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    protected $fillable = [
        'lieudep',
        'lieudest',
        'dateHeureDem',
        'idtypevoiture',
        'status',
        'iduser',
        
        
    ];

    protected static function boot()
    {
        parent::boot();

        // Événement lorsqu'une demande est supprimée
        static::deleting(function ($demande) {
            // Supprimer les notifications associées
            $demande->notifications()->delete();
        });
    }

    // Modèle Demande
    public function typevoiture()
    {
        return $this->belongsTo(Typevoiture::class, 'idtypevoiture');
    }

    // Relation avec les notifications
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'demande_id');
    }

    public function demenageur()
{
    return $this->belongsTo(User::class, 'iduser');
}


}
