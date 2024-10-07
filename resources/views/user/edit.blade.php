<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 min-h-screen p-5 flex items-center justify-center">
    <div class="container mx-auto max-w-lg">
        <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-200">

            <!-- Judul Halaman -->
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Edit User</h2>
            
            <!-- Form Edit User -->
            <form action="{{ url('user', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <!-- Input Nama -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out" required>
                </div>
                
                <!-- Input Email -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out" required>
                </div>

                <!-- Input Password (opsional) -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password <span class="text-gray-500">(Kosongkan jika tidak diubah)</span></label>
                    <input type="password" name="password" id="password" class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                </div>

                <!-- Tombol Back to List & Update -->
                <div class="flex justify-between items-center">
                    <!-- Tombol Back to List -->
                    <a href="{{ url('user') }}" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-lg shadow hover:bg-gray-400 transition ease-in-out">
                        Kembali
                    </a>
                    
                    <!-- Tombol Update -->
                    <button type="submit" class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white py-3 px-6 rounded-lg shadow-md transition-transform duration-300 ease-in-out transform hover:scale-105">
                        Update
                    </button>
                </div>
            </form>

        </div>
    </div>
</body>
</html>
