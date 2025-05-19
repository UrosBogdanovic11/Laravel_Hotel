<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $reservations = Reservation::where('UserID', $user->UserID)
            ->with('payment')
            ->get();

        return view('page.profile', compact('user', 'reservations'));
    }

    public function cancel($id)
    {
        $reservation = Reservation::where('ReservationID', $id)
            ->where('UserID', Auth::id())
            ->first();

        if (!$reservation) {
            return redirect()->back()->with('error', 'Rezervacija nije pronađena.');
        }

        $reservation->update(['Status' => 'canceled']);

        return redirect()->back()->with('success', 'Rezervacija je uspešno otkazana.');
    }
}
