<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{

    use HasFactory;

    protected $fillable = [
        'titre',
        'auteur',
        'status',
    ];

    // Relation : un livre peut avoir plusieurs réservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
