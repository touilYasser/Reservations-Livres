<?php

namespace App\Http\Controllers\Bibliothecaire;

use App\Http\Controllers\Controller;
use App\Models\Livre;
use App\Models\Reservation;
use Illuminate\Http\Request;

class BibliothecaireController extends Controller
{
    public function index()
    {
        $totalLivres = Livre::count();
        $livresDisponibles = Livre::where('status', 'disponible')->count();
        $livresReserves = Livre::where('status', 'reserver')->count();

        $reservationsEnCours = Reservation::where('status', 'en_cours')->count();
        $reservationsRendues = Reservation::where('status', 'rendu')->count();
        $reservationsEnRetard = Reservation::where('status', 'overdue')->count();

        return view('bibliothecaire.dashboard', [
            'totalLivres' => $totalLivres,
            'livresDisponibles' => $livresDisponibles,
            'livresReserves' => $livresReserves,
            'reservationsEnCours' => $reservationsEnCours,
            'reservationsRendues' => $reservationsRendues,
            'reservationsEnRetard' => $reservationsEnRetard,
        ]);
    }
}
