<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Livre;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EtudiantController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $reservationsEnCours = Reservation::where('user_id', $user->id)->where('status', 'en_cours')->count();
        $reservationsRendues = Reservation::where('user_id', $user->id)->where('status', 'rendu')->count();
        $reservationsEnRetard = Reservation::where('user_id', $user->id)->where('status', 'overdue')->count();

        $livresDisponibles = Livre::where('status', 'disponible')->take(5)->get();

        return view('dashboard', [
            'reservationsEnCours' => $reservationsEnCours,
            'reservationsRendues' => $reservationsRendues,
            'reservationsEnRetard' => $reservationsEnRetard,
            'livresDisponibles' => $livresDisponibles,
        ]);
    }
}
