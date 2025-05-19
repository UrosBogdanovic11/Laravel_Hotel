<x-app>
    @section('content')
    <div class="container mx-auto pt-40 pb-30">
        <h2 class="text-2xl font-bold text-center mb-6">Rezervacija sobe</h2>
    
        @if(Auth::check())
            <form action="{{ route('reservations.store') }}" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
                @csrf
                
                <!-- Odabir tipa sobe -->
                <div class="mb-4">
                    <label for="RoomID" class="block text-gray-700 font-semibold">Tip sobe:</label>
                    <select id="RoomID" name="RoomID" class="w-full border rounded-lg p-2" required>
                        @foreach($rooms as $room)
                            <option value="{{ $room->RoomID }}" data-price="{{ $room->Price }}">
                                {{ $room->Type }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Odabir CheckIn i CheckOut datuma -->
                <div class="mb-4">
                    <label for="CheckIn" class="block text-gray-700 font-semibold">Check-In datum:</label>
                    <input type="date" id="CheckIn" name="CheckIn" class="w-full border rounded-lg p-2" required>
                </div>
    
                <div class="mb-4">
                    <label for="CheckOut" class="block text-gray-700 font-semibold">Check-Out datum:</label>
                    <input type="date" id="CheckOut" name="CheckOut" class="w-full border rounded-lg p-2" required>
                </div>
    
                <!-- Prikaz cene -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold">Cena aranžmana:</label>
                    <p id="TotalPrice" class="text-lg font-bold">0€</p>
                </div>
                
                
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">
                    Rezerviši
                </button>
            </form>
        @else
            <p class="text-center text-red-500 text-lg font-semibold">Morate biti ulogovani da biste izvršili rezervaciju.</p>
        @endif
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const roomTypeSelect = document.getElementById("RoomID");
            const checkinInput = document.getElementById("CheckIn");
            const checkoutInput = document.getElementById("CheckOut");
            const totalPriceDisplay = document.getElementById("TotalPrice");
    
            function fetchUnavailableDates(roomID) {
                fetch(`/api/unavailable-dates/${roomID}`)
                    .then(response => response.json())
                    .then(dates => {
                        checkinInput.removeAttribute("disabled");
                        checkoutInput.removeAttribute("disabled");
                        checkinInput.min = new Date().toISOString().split("T")[0];
                        checkoutInput.min = new Date().toISOString().split("T")[0];
                        
                        checkinInput.addEventListener("input", function () {
                            checkoutInput.min = checkinInput.value;
                        });
                        
                        checkinInput.addEventListener("change", function () {
                            if (dates.includes(checkinInput.value)) {
                                alert("Ovaj datum je zauzet. Izaberite drugi datum.");
                                checkinInput.value = "";
                            }
                        });
                        
                        checkoutInput.addEventListener("change", function () {
                            if (dates.includes(checkoutInput.value)) {
                                alert("Ovaj datum je zauzet. Izaberite drugi datum.");
                                checkoutInput.value = "";
                            }
                        });
                    });
            }
    
            function calculatePrice() {
                const pricePerNight = parseFloat(roomTypeSelect.options[roomTypeSelect.selectedIndex].getAttribute("data-price")) || 0;
                const checkinDate = new Date(checkinInput.value);
                const checkoutDate = new Date(checkoutInput.value);
                
                if (checkinDate && checkoutDate && checkoutDate > checkinDate) {
                    const nights = (checkoutDate - checkinDate) / (1000 * 60 * 60 * 24);
                    const totalPrice = nights * pricePerNight;
                    totalPriceDisplay.textContent = totalPrice.toFixed(2) + "€";
                } else {
                    totalPriceDisplay.textContent = "0€";
                }
            }
    
            roomTypeSelect.addEventListener("change", function () {
                fetchUnavailableDates(this.value);
                calculatePrice();
            });
    
            checkinInput.addEventListener("input", calculatePrice);
            checkoutInput.addEventListener("input", calculatePrice);
        });
    </script>
    @endsection
    </x-app>
    