<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Payment;

class AdminController extends Controller
{
    public function index()
    {
        $reservations = Reservation::leftJoin('payments', 'reservations.ReservationID', '=', 'payments.ReservationID')
            ->select('reservations.*', 'payments.Amount')
            ->get();

        return view('page.dashboard', compact('reservations'));
    }

    public function update(Request $request, $id)
{
    $reservation = Reservation::findOrFail($id);

    // Validacija
    $validatedData = $request->validate([
        'CheckIn' => 'required|date',
        'CheckOut' => 'required|date|after_or_equal:CheckIn',
        'Status' => 'required|in:active,canceled',
    ]);

    // Azuriranje rezervacije
    $reservation->CheckIn = $validatedData['CheckIn'];
    $reservation->CheckOut = $validatedData['CheckOut'];
    $reservation->Status = $validatedData['Status'];
    $reservation->save();

    return response()->json(['message' => 'Rezervacija uspešno ažurirana']);
}

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        Payment::where('ReservationID', $id)->delete();
        $reservation->delete();
        return redirect()->route('dashboard')->with('success', 'Rezervacija uspešno obrisana.');
    }
}
