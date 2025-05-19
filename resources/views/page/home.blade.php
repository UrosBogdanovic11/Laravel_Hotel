<x-app title="Pearl Lagoon Hotel">
    @section('content')
    
    <div class="relative h-screen">
        <div class="absolute inset-0 bg-cover bg-center"
             style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset('images/home.jpg.jpg') }}');">
            <div class="absolute inset-0 flex items-center">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white text-center w-full">
                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6">Pearl Lagoon Hotel</h1>
                    <p class="text-lg md:text-xl mb-8">Odmaralište sa 5 zvezdica u srcu prirode</p>
                    
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Amenities Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center mb-12">Hotelske Pogodnosti
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="p-6 bg-white rounded-lg shadow-md h-full flex flex-col items-center text-center">
                    <div class="mb-4">
                        <hero-icon name="swimming-pool" class="h-12 w-12 text-blue-600"></hero-icon>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold mb-2">Bazen</h3>
                        <p class="text-gray-600">Grejani otvoreni bazen sa panoramskim pogledom</p>
                    </div>
                </div>

                
                <div class="p-6 bg-white rounded-lg shadow-md h-full flex flex-col items-center text-center">
                    <div class="mb-4">
                        <hero-icon name="beaker" class="h-12 w-12 text-blue-600"></hero-icon>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold mb-2">Teretana</h3>
                        <p class="text-gray-600">Moderni fitness centar sa vrhunskom opremom za vaš trening</p>
                    </div>
                </div>

                
                <div class="p-6 bg-white rounded-lg shadow-md h-full flex flex-col items-center text-center">
                    <div class="mb-4">
                        <hero-icon name="sparkles" class="h-12 w-12 text-blue-600"></hero-icon>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold mb-2">Spa</h3>
                        <p class="text-gray-600">Opuštajuće wellness terapije</p>
                    </div>
                </div>
            </div>

            <div class="mt-12 flex justify-center">
                <a href="{{ route('amenities') }}" class="bg-blue-600 text-white px-8 py-3 rounded-full hover:bg-blue-700 transition-colors text-lg font-medium shadow-md">
                    Saznajte više
                </a>
            </div>
        </div>
    </section>

    <!-- Rooms Section -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center mb-12">Sobe i Apartmani</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <div class="flex justify-center">
                    <div class="rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow w-full max-w-md">
                        <img src="{{ asset('images/president.jpg') }}" alt="Deluxe Room" class="w-full h-96 object-cover">
                    </div>
                </div>

                
                <div class="flex justify-center">
                    <div class="rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow w-full max-w-md">
                        <img src="{{ asset('images/standard.jpg') }}" alt="Executive Suite" class="w-full h-96 object-cover">
                    </div>
                </div>
            </div>

            <div class="mt-12 flex justify-center">
                <a href="{{ route('rooms') }}" class="bg-blue-600 text-white px-8 py-3 rounded-full hover:bg-blue-700 transition-colors text-lg font-medium shadow-md">
                    Pogledajte
                </a>
                
            </div>
        </div>
    </section>
    @endsection
</x-app>
