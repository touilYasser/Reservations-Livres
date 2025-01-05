<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // Relation : une réservation appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation : une réservation concerne un livre
    public function livre()
    {
        return $this->belongsTo(Livre::class);
    }
}
