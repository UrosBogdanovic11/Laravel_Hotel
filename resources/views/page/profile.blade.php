<x-app>
    @section('content')
    <div class="container mx-auto pt-35 pb-80">
        <h2 class="text-2xl font-bold text-center mb-6">Moj Profil</h2>

        <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-4">Moje Rezervacije</h3>

            @if(session('success'))
                <div class="mb-4 text-green-500">{{ session('success') }}</div>
            @endif

            @if($reservations->isEmpty())
                <p class="text-center text-gray-600">Nemate aktivnih rezervacija.</p>
            @else
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 p-2">ID</th>
                            <th class="border border-gray-300 p-2">Check-In</th>
                            <th class="border border-gray-300 p-2">Check-Out</th>
                            <th class="border border-gray-300 p-2">Cena (€)</th>
                            <th class="border border-gray-300 p-2">Status</th>
                            <th class="border border-gray-300 p-2">Akcija</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $reservation)
                            <tr class="text-center">
                                <td class="border border-gray-300 p-2">{{ $reservation->ReservationID }}</td>
                                <td class="border border-gray-300 p-2">{{ $reservation->CheckIn }}</td>
                                <td class="border border-gray-300 p-2">{{ $reservation->CheckOut }}</td>
                                <td class="border border-gray-300 p-2">
                                    {{ $reservation->payment->Amount ?? 'N/A' }}€
                                </td>
                                <td class="border border-gray-300 p-2">{{ ucfirst($reservation->Status) }}</td>
                                <td class="border border-gray-300 p-2">
                                    @if($reservation->Status === 'active')
                                        <form action="{{ route('reservations.cancel', $reservation->ReservationID) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">
                                                Otkaži
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-500">Otkazano</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    @endsection
</x-app>
