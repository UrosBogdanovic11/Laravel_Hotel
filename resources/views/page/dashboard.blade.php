<x-app>
    @section('content')
    <div class="container mx-auto pt-30 pb-70">
        <h2 class="text-2xl font-bold text-center mb-6">Admin Dashboard</h2>
        
        @if(session('success'))
        <div class="mb-4 text-green-500 bg-green-100 p-2 rounded">{{ session('success') }}</div>
        @endif
        
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-center">
                    <th class="border border-gray-300 p-2">Reservation ID</th>
                    <th class="border border-gray-300 p-2">User ID</th>
                    <th class="border border-gray-300 p-2">Check-In</th>
                    <th class="border border-gray-300 p-2">Check-Out</th>
                    <th class="border border-gray-300 p-2">Cena (€)</th>
                    <th class="border border-gray-300 p-2">Status</th>
                    <th class="border border-gray-300 p-2">Akcije</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                <tr class="text-center">
                    <td class="border border-gray-300 p-2">{{ $reservation->ReservationID }}</td>
                    <td class="border border-gray-300 p-2">{{ $reservation->UserID }}</td>
                    <td class="border border-gray-300 p-2">
                        <input type="date" value="{{ $reservation->CheckIn }}" id="checkin-{{ $reservation->ReservationID }}" class="border p-1 rounded hidden" disabled>
                        <span id="checkin-text-{{ $reservation->ReservationID }}">{{ $reservation->CheckIn }}</span>
                    </td>
                    <td class="border border-gray-300 p-2">
                        <input type="date" value="{{ $reservation->CheckOut }}" id="checkout-{{ $reservation->ReservationID }}" class="border p-1 rounded hidden" disabled>
                        <span id="checkout-text-{{ $reservation->ReservationID }}">{{ $reservation->CheckOut }}</span>
                    </td>
                    <td class="border border-gray-300 p-2">{{ $reservation->Amount ?? 'N/A' }}€</td>
                    <td class="border border-gray-300 p-2">
                        <select id="status-{{ $reservation->ReservationID }}" class="border p-1 rounded hidden" disabled>
                            <option value="active" {{ $reservation->Status === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="canceled" {{ $reservation->Status === 'canceled' ? 'selected' : '' }}>Canceled</option>
                        </select>
                        <span id="status-text-{{ $reservation->ReservationID }}">{{ ucfirst($reservation->Status) }}</span>
                    </td>
                    <td class="border border-gray-300 p-2 flex justify-center gap-2">
                        <button onclick="enableEdit({{ $reservation->ReservationID }})" id="edit-btn-{{ $reservation->ReservationID }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">Edit</button>
                        <button onclick="updateReservation({{ $reservation->ReservationID }})" id="save-btn-{{ $reservation->ReservationID }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition hidden">Sačuvaj</button>
                        
                        <form action="{{ route('admin.reservations.destroy', $reservation->ReservationID) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">Obriši</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <script>
        function enableEdit(id) {
            document.getElementById(`checkin-${id}`).classList.remove('hidden');
            document.getElementById(`checkout-${id}`).classList.remove('hidden');
            document.getElementById(`status-${id}`).classList.remove('hidden');
            
            document.getElementById(`checkin-text-${id}`).classList.add('hidden');
            document.getElementById(`checkout-text-${id}`).classList.add('hidden');
            document.getElementById(`status-text-${id}`).classList.add('hidden');
            
            document.getElementById(`checkin-${id}`).disabled = false;
            document.getElementById(`checkout-${id}`).disabled = false;
            document.getElementById(`status-${id}`).disabled = false;
            
            document.getElementById(`edit-btn-${id}`).classList.add('hidden');
            document.getElementById(`save-btn-${id}`).classList.remove('hidden');
        }
        
        function updateReservation(id) {
            const checkin = document.getElementById(`checkin-${id}`).value;
            const checkout = document.getElementById(`checkout-${id}`).value;
            const status = document.getElementById(`status-${id}`).value;
            
            console.log("Updating reservation:", { checkin, checkout, status });
            
            fetch(`/admin/reservations/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ CheckIn: checkin, CheckOut: checkout, Status: status })
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    console.log("Rezervacija je ažurirana:", data);
                    location.reload(); 
                }
            })
            .catch(error => {
                console.error('Greška:', error);
                alert("Došlo je do greške prilikom ažuriranja rezervacije.");
            });
        }
        
    </script>
    @endsection
</x-app>
