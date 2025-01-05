<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Livre;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

    public function index(){
    $reservations = Reservation::where('user_id', Auth::id())->with('livre')->paginate(10);
    $enCours = Reservation::where('user_id', Auth::id())->where('status', 'en_cours')->count();
    $rendu = Reservation::where('user_id', Auth::id())->where('status', 'rendu')->count();
    $retard = Reservation::where('user_id', Auth::id())->where('status', 'overdue')->count();
    return view('etudiant.reservations.index', compact('reservations','enCours', 'rendu', 'retard'));
    }

    public function store(Request $request, $id)
{
    $livre = Livre::findOrFail($id);

    if (!$livre || $livre->status !== 'disponible') {
        return redirect()->back();
    }

    Reservation::create([
        'user_id' => Auth::id(),
        'livre_id' => $livre->id,
        'date_reservation' => now(),
        'date_retour' => now()->addDays(7),
    ]);

    $livre->update(['status' => 'reserver']);

    return redirect()->route('etudiant.reservations.index');
}

public function return($id)
{
    $reservation = Reservation::where('id', $id)
        ->where('user_id', Auth::id())
        ->where('status', 'en_cours')
        ->firstOrFail();

    $reservation->status = 'rendu';
    $reservation->save();

    $reservation->livre->status = 'disponible';
    $reservation->livre->save();

    return redirect()->route('etudiant.reservations.index')->with('success', 'Livre rendu avec succès.');
}

public function destroy($id)
{
    $reservation = Reservation::findOrFail($id);

    if (!$reservation || $reservation->user_id != Auth::id()) {
        return redirect()->back();
    }

    $livre = $reservation->livre;
    $livre->update(['status' => 'disponible']);

    $reservation->delete();

    return redirect()->route('etudiant.reservations.index');
}



}
