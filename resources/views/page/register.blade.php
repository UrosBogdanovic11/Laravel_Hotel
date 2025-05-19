<x-app>
    @section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
            <h2 class="text-2xl font-bold text-center text-gray-900 mb-6">Register</h2>
            <form method="POST" action="{{ route('register.store') }}">
                <!-- Prikaz grešaka -->
            @if ($errors->any())
            <div class="bg-red-500 text-white p-4 mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
                
                
                
                @csrf
                <!-- Ime -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">First Name</label>
                    <input type="text" id="Name" name="Name" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <!-- Prezime -->
                <div class="mb-4">
                    <label for="surname" class="block text-gray-700">Last Name</label>
                    <input type="text" id="Surname" name="Surname" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <!-- JMBG -->
                <div class="mb-4">
                    <label for="JMBG" class="block text-gray-700">JMBG</label>
                    <input type="text" id="JMBG" name="JMBG" required 
                           maxlength="13" pattern="\d{13}" 
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           title="JMBG mora imati tačno 13 cifara">
                </div>
                
                <!-- Phone -->
                <div class="mb-4">
                    <label for="Phone" class="block text-gray-700">Phone</label>
                    <input type="tel" id="Phone" name="Phone" required 
                           pattern="[0-9]{9,15}"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           title="Telefon mora imati 9-15 cifara">
                </div>
                
                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="Email" name="Email" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <!-- Password Confirmation -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <!-- Submit Dugme -->
                <div class="mt-6">
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">Register</button>
                </div>
            </form>
        </div>
    </div>
    @endsection
</x-app>