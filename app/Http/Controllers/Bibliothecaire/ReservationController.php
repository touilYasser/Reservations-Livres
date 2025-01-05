<?php

namespace App\Http\Controllers\Bibliothecaire;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
{
    $reservations = Reservation::with(['livre', 'user'])->paginate(10);
    return view('bibliothecaire.reservations.index', compact('reservations'));
}

public function updateStatus(Request $request, $id)
{
    $validated = $request->validate([
        'status' => 'required|in:en_cours,rendu,overdue',
    ]);

    $reservation = Reservation::findOrFail($id);
    $reservation->update(['status' => $validated['status']]);

    if ($validated['status'] === 'rendu') {
        $reservation->livre->update(['status' => 'disponible']);
    }

    return redirect()->route('bibliothecaire.reservations.index');
}

public function show($id)
{
    $reservation = Reservation::with(['livre', 'user'])->findOrFail($id);

    return view('bibliothecaire.reservations.show', compact('reservation'));
}

}
