<nav class="bg-white/50 backdrop-blur-sm shadow-lg fixed w-full z-50 h-24 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
        <div class="flex justify-between items-center h-full">
            <!-- Logo klik -->
            <div class="flex items-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Hotel Logo" 
                    class="h-20 w-20 rounded-lg object-cover shadow-lg transition-all">
                </a>
            </div>
            
            
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('rooms') }}" class="text-gray-700 hover:text-blue-600 px-4 py-3 text-lg">Sobe i Apartmani</a>
                <a href="{{ route('amenities') }}" class="text-gray-700 hover:text-blue-600 px-4 py-3 text-lg">Pogodnosti</a>
                <a href="{{ route('dining') }}" class="text-gray-700 hover:text-blue-600 px-4 py-3 text-lg">Ugostiteljstvo</a>
            </div>
            
            <!-- Prikaz za ulogovanog korisnika -->
            <div class="hidden md:flex items-center space-x-6">
                @auth
                <div class="flex items-center gap-4">
                    <span class="text-gray-700">Hi, {{ Auth::user()->Name }}</span>
                    
                    @if(Auth::user()->role === 'Admin')
                    <a href="{{route('dashboard')}}" class="bg-blue-600 text-white px-8 py-3 rounded-full 
                                      hover:bg-blue-700 transition-colors text-lg font-medium">
                    Dashboard
                </a>
                @else
                <a href="{{ route('profile') }}" class="bg-blue-600 text-white px-8 py-3 rounded-full 
                        hover:bg-blue-700 transition-colors text-lg font-medium">
                Moj Profil
            </a>
            @endif
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-full 
                                       hover:bg-blue-700 transition-colors text-lg font-medium">
                Log Out
            </button>
        </form>
    </div>
    @else
    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 px-4 py-3 text-lg">Log In</a>
    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-8 py-3 rounded-full 
                                hover:bg-blue-700 transition-colors text-lg font-medium">
    Register
</a>
@endauth
</div>
</div>
</div>
</nav>
