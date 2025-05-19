<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
   
    public function show()
    {
        
        $rooms = Room::all();

       
        return view('page.reservation', compact('rooms'));
    }
    

public function store(Request $request)
{
    if (!Auth::check()) {
        return redirect('login')->with('error', 'Morate se prijaviti da biste napravili rezervaciju!');
    }

    $validated = $request->validate([
        'RoomID' => 'required|exists:rooms,RoomID',
        'CheckIn' => 'required|date|after_or_equal:today',
        'CheckOut' => 'required|date|after:CheckIn',
    ]);


    $conflict = Reservation::where('RoomID', $validated['RoomID'])
        ->where(function($query) use ($validated) {
            $query->whereBetween('CheckIn', [$validated['CheckIn'], $validated['CheckOut']])
                  ->orWhereBetween('CheckOut', [$validated['CheckIn'], $validated['CheckOut']])
                  ->orWhere(function($query) use ($validated) {
                      $query->where('CheckIn', '<', $validated['CheckIn'])
                            ->where('CheckOut', '>', $validated['CheckOut']);
                  });
        })->exists();

    if($conflict) {
        return back()->withErrors(['error' => 'Ova soba je već rezervisana za odabrane datume.']);
    }

    // Cena po noci
    $room = Room::find($validated['RoomID']);
    $pricePerNight = $room->Price;

    // Broj nocenja
    $checkinDate = new \DateTime($validated['CheckIn']);
    $checkoutDate = new \DateTime($validated['CheckOut']);
    $nights = $checkoutDate->diff($checkinDate)->days;

    $totalPrice = $nights * $pricePerNight;


    $reservation = Reservation::create([
        'UserID' => Auth::id(),
        'RoomID' => $validated['RoomID'],
        'CheckIn' => $validated['CheckIn'],
        'CheckOut' => $validated['CheckOut'],
        'Status' => 'active'
    ]);


    Payment::create([
        'ReservationID' => $reservation->ReservationID,
        'Amount' => $totalPrice,
        'Status' => 'pending'
    ]);

    return redirect()->route('rooms')->with('success', 'Rezervacija je uspešno napravljena!');
}

}
