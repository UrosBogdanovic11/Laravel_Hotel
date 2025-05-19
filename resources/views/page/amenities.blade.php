<x-app title="Hotel Amenities">
  @section('content')
  <div class="relative w-4/5 h-1/2 mx-auto pt-10 rounded-2xl overflow-hidden">
    <div class="overflow-hidden w-full h-full">
      <div class="flex transition-transform duration-500 ease-in-out" id="slider">
        <img src="{{ asset('images/proba.jpg') }}" alt="Slika 1" class="w-full h-full object-cover rounded-2xl">
        <img src="{{ asset('images/gym.jpg') }}" alt="Slika 2" class="w-full h-full object-cover rounded-2xl">
        <img src="{{ asset('images/spa.jpg') }}" alt="Slika 3" class="w-full h-full object-cover rounded-2xl">
      </div>
    </div>
    <!-- Kontrole za navigaciju -->
    <button id="prev" class="absolute top-1/2 left-2 transform -translate-y-1/2 text-white bg-black bg-opacity-50 p-2 rounded-full">
      &#10094;
    </button>
    <button id="next" class="absolute top-1/2 right-2 transform -translate-y-1/2 text-white bg-black bg-opacity-50 p-2 rounded-full">
      &#10095;
    </button>
</div>
  
  <!-- Amenities Dropdown -->
  <section class="py-16 bg-white w-4/5 mx-auto px-4">
    <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Hotelske pogodnosti</h2>
    
    <div class="space-y-4">
      <details class="border border-gray-300 rounded-lg p-4">
        <summary class="text-lg font-semibold cursor-pointer">Bazen</summary>
        <p class="mt-2 text-gray-700">Naš spoljašnji bazen sa grejanjem pruža nezaboravan doživljaj uz pogled na horizont, savršen za opuštanje i uživanje u prirodnoj lepoti.</p>
      </details>
      
      <details class="border border-gray-300 rounded-lg p-4">
        <summary class="text-lg font-semibold cursor-pointer">Teretana</summary>
        <p class="mt-2 text-gray-700">Naš moderni fitness centar je otvoren 24/7 i opremljen najnovijom kardio i opremom za trening snage.</p>
      </details>
      
      <details class="border border-gray-300 rounded-lg p-4">
        <summary class="text-lg font-semibold cursor-pointer">Spa</summary>
        <p class="mt-2 text-gray-700">Doživite vrhunsko opuštanje uz naše premium spa tretmane i ekskluzivne wellness pakete.</p>
      </details>
    </div>
  </section>

  <section class="py-16 bg-gray-50 w-4/5 mx-auto px-4">
    <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Karakteristike hotela</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        
        <div class="bg-white p-6 rounded-lg shadow-lg flex items-center justify-center">
            <div class="text-center">
                <x-heroicon-s-clock class="w-16 h-16 text-blue-600 mb-4" />
                <h3 class="text-lg font-semibold text-gray-800">Recepcija 24/7</h3>
                <p class="mt-2 text-gray-600">Naša recepcija je dostupna u svakom trenutku kako bi vam pomogla tokom vašeg boravka.</p>
            </div>
        </div>

       
        <div class="bg-white p-6 rounded-lg shadow-lg flex items-center justify-center">
            <div class="text-center">
                <x-heroicon-s-wifi class="w-16 h-16 text-blue-600 mb-4" />
                <h3 class="text-lg font-semibold text-gray-800">Besplatan Wi-Fi</h3>
                <p class="mt-2 text-gray-600">Ostanite povezani uz besplatan Wi-Fi dostupan širom hotela.</p>
            </div>
        </div>

        
        <div class="bg-white p-6 rounded-lg shadow-lg flex items-center justify-center">
            <div class="text-center">
                <x-heroicon-s-cake class="w-16 h-16 text-blue-600 mb-4" />
                <h3 class="text-lg font-semibold text-gray-800">Room Service</h3>
                <p class="mt-2 text-gray-600">Uživajte u ukusnim obrocima dostavljenim u vašu sobu 24 sata dnevno.</p>
            </div>
        </div>

       
        <div class="bg-white p-6 rounded-lg shadow-lg flex items-center justify-center">
            <div class="text-center">
                <x-heroicon-s-hand-thumb-up class="w-16 h-16 text-blue-600 mb-4" />
                <h3 class="text-lg font-semibold text-gray-800">Pet-Friendly</h3>
                <p class="mt-2 text-gray-600">Naš hotel je prijateljski nastrojen prema ljubimcima, pružajući udoban boravak za vaše krznene prijatelje.</p>
            </div>
        </div>

        
        <div class="bg-white p-6 rounded-lg shadow-lg flex items-center justify-center">
            <div class="text-center">
                <x-heroicon-s-lifebuoy class="w-16 h-16 text-blue-600 mb-4" />
                <h3 class="text-lg font-semibold text-gray-800">Bazen</h3>
                <p class="mt-2 text-gray-600">Opustite se pored bazena i uživajte u mirnom okruženju, uz prisustvo spasioca koji brine o vašoj sigurnosti.</p>
            </div>
        </div>

        
        <div class="bg-white p-6 rounded-lg shadow-lg flex items-center justify-center">
            <div class="text-center">
                <x-heroicon-s-sparkles class="w-16 h-16 text-blue-600 mb-4" />
                <h3 class="text-lg font-semibold text-gray-800">Spa</h3>
                <p class="mt-2 text-gray-600">Uživajte u našim luksuznim spa tretmanima, dizajniranim da vas opuste i osveže.</p>
            </div>
        </div>

        
        <div class="bg-white p-6 rounded-lg shadow-lg flex items-center justify-center">
            <div class="text-center">
                <x-heroicon-s-bolt class="w-16 h-16 text-blue-600 mb-4" /> 
                <h3 class="text-lg font-semibold text-gray-800">Teretana</h3>
                <p class="mt-2 text-gray-600">Otvorena 24/7 dostupna za sve goste hotela.</p>
            </div>
        </div>
    </div>
</section>


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
  
      
      const prevButton = document.getElementById("prev");
      const nextButton = document.getElementById("next");
  
      prevButton.addEventListener('click', function () {
        moveSlider(-1);
      });
  
      nextButton.addEventListener('click', function () {
        moveSlider(1);
      });
    });
  </script>
  @endpush
</x-app>
