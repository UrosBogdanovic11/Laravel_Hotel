<x-app>
    @section('content')
    <div class="w-4/5 mx-auto pt-32 pb-16">
        
       
        <section class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900">Gourmet Restaurant</h2>
            <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Smešten u srcu hotela, naš restoran i lounge bar nude savršen spoj savremenog dizajna, 
                vrhunske gastronomije i pažljivo odabrane selekcije vina iz celog sveta. Otvorena kuhinja omogućava 
                gostima da uživaju u dinamičnom procesu pripreme jela, dok elegantni enterijer sa sofisticiranim osvetljenjem, 
                minimalističkim linijama i modernim detaljima stvara atmosferu luksuza i udobnosti. Bilo da ste u potrazi za ekskluzivnim 
                kulinarskim iskustvom ili opuštanjem uz koktel u prijatnom ambijentu, naš restoran je idealno mesto za nezaboravne trenutke.
            </p>
        </section>
    
        
        <section class="relative w-4/5 h-[600px] mx-auto pt-10 rounded-2xl overflow-hidden">
            <div class="overflow-hidden w-full h-full">
                <div class="flex transition-transform duration-500 ease-in-out" id="slider">
                    <img src="{{ asset('images/dining.jpg') }}" alt="Restoran Slika 1" class="w-full h-full object-cover rounded-2xl">
                    <img src="{{ asset('images/dining1.jpg') }}" alt="Restoran Slika 2" class="w-full h-full object-cover rounded-2xl">
                    <img src="{{ asset('images/dining2.jpg') }}" alt="Restoran Slika 3" class="w-full h-full object-cover rounded-2xl">
                </div>
            </div>
            
            <button id="prev" class="absolute top-1/2 left-2 transform -translate-y-1/2 text-white bg-black bg-opacity-50 p-2 rounded-full">
                &#10094;
            </button>
            <button id="next" class="absolute top-1/2 right-2 transform -translate-y-1/2 text-white bg-black bg-opacity-50 p-2 rounded-full">
                &#10095;
            </button>
        </section>

    </div>
    @endsection
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let currentIndex = 0;
            const slides = document.querySelectorAll("#slider img");
            const totalSlides = slides.length;
    
            function moveSlider(direction) {
                currentIndex += direction;
                if (currentIndex < 0) currentIndex = totalSlides - 1;
                if (currentIndex >= totalSlides) currentIndex = 0;
    
                const offset = -currentIndex * 100;
                document.getElementById("slider").style.transform = `translateX(${offset}%)`;
            }
    
            document.getElementById("prev").addEventListener('click', function () {
                moveSlider(-1);
            });
    
            document.getElementById("next").addEventListener('click', function () {
                moveSlider(1);
            });
        });
    </script>
   @endpush
</x-app>