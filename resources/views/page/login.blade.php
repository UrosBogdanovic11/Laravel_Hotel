<x-app>
    @section('content')
    <div class="flex items-center justify-center min-h-screen bg-white">
        <div class="bg-gray-100 p-8 rounded-2xl shadow-lg w-96">
            <h2 class="text-2xl font-bold text-gray-900 text-center mb-6">Log In</h2>
            
            <!-- Forma za prijavu -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="Email" name="Email" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Log In</button>
            </form>
            
            <p class="text-center text-gray-600 mt-4">Don't have an account? 
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Sign up</a>
            </p>
        </div>
    </div>
    @endsection
</x-app>
