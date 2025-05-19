<x-app>
    @section('content')
    <div class="w-4/5 mx-auto pt-32 pb-16">
        <!-- Sekcija za naslov i kratak opis -->
        <section class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900">Sobe i Apartmani</h2>
            <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Doživite neuporediv komfor i eleganciju u našim luksuznim sobama i apartmanima, dizajniranim za vaš potpuni odmor.
            </p>
    
            <!-- Dugme za rezervaciju koje vodi na stranu za rezervaciju -->
            <a href="{{ route('reservation') }}" 
               class="mt-6 inline-block bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700">
                Rezervišite
            </a>
        </section>
    
        <!-- Sekcija za sobe -->
        <section class="space-y-16">
            @php
                $rooms = [
                    ['Standard Room', ['standard.jpg', 'standard2.jpg', 'standard3.jpg'], 'Uživajte u udobnom boravku u našim elegantnim standardnim sobama, sa modernim sadržajem i stilskim enterijerom.'],
                    ['Presidential Suite', ['president.jpg', 'president2.jpg', 'president3.jpg', 'president4.jpg'], 'Doživite luksuz u svom najboljem izdanju u našem Predsedničkom apartmanu, koji nudi prostrane dnevne sobe i vrhunske usluge.'],
                    ['One Bedroom Suite', ['1soba.jpg', '1soba2.jpg', '1soba3.jpg'], 'Idealni za duže boravke, naši Apartmani sa jednom spavaćom sobom pružaju odvojeni prostor za boravak radi dodatne udobnosti.'],
                    ['Two Bedroom Suite', ['2soba.jpg', '2soba2.jpg', '2soba3.jpg'], 'Idealni za porodice, naši Apartmani sa dve spavaće sobe nude prostran prostor i savremeni komfor.']
                ];
            @endphp

            @foreach ($rooms as $room)
            <div class="flex flex-col md:flex-row items-center bg-white shadow-lg rounded-2xl overflow-hidden">
                <!-- Slider -->
                <div class="relative w-full md:w-1/3 h-64 overflow-hidden">
                    <div class="flex transition-transform duration-500 ease-in-out" id="slider-{{ Str::slug($room[0]) }}">
                        @foreach ($room[1] as $index => $image)
                            <img src="{{ asset('images/' . $image) }}" alt="{{ $room[0] }} Image" class="w-full h-full object-cover {{ $index === 0 ? 'block' : 'hidden' }} transition-all duration-500 ease-in-out">
                        @endforeach
                    </div>
                    <button class="absolute top-1/2 left-2 transform -translate-y-1/2 text-white bg-black bg-opacity-50 p-2 rounded-full prev" data-slider="slider-{{ Str::slug($room[0]) }}">&#10094;</button>
                    <button class="absolute top-1/2 right-2 transform -translate-y-1/2 text-white bg-black bg-opacity-50 p-2 rounded-full next" data-slider="slider-{{ Str::slug($room[0]) }}">&#10095;</button>
                </div>
                
                <!-- Opis sobe -->
                <div class="p-8 md:w-2/3 text-center md:text-left">
                    <h3 class="text-2xl font-semibold text-gray-800">{{ $room[0] }}</h3>
                    <p class="mt-2 text-gray-600">{{ $room[2] }}</p>
                </div>
            </div>
            @endforeach
        </section>
    </div>
    @endsection
    
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.prev, .next').forEach(button => {
                button.addEventListener('click', function () {
                    const slider = document.getElementById(this.dataset.slider);
                    const slides = slider.children;
                    let index = [...slides].findIndex(slide => slide.classList.contains('block'));
    
                    // Ukloni 'block' klasu sa trenutne slike
                    slides[index].classList.remove('block');
                    slides[index].classList.add('hidden');
    
                    // Izračunaj novi indeks
                    index += this.classList.contains('next') ? 1 : -1;
                    if (index < 0) index = slides.length - 1;
                    if (index >= slides.length) index = 0;
    
                    // Dodaj 'block' klasu novoj slici
                    slides[index].classList.remove('hidden');
                    slides[index].classList.add('block');
                });
            });
        });
    </script>
    @endpush
</x-app>
