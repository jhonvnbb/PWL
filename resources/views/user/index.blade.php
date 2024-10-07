<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List User Page</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 min-h-screen p-5">
    <div class="container mx-auto">
        <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-200">

            <!-- Header: Judul dan Tombol Tambah User -->
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">List User</h2>
                <a href="{{ url('user/create') }}" class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white py-2 px-6 rounded-lg shadow-md transition-transform duration-300 ease-in-out transform hover:scale-105">
                    Tambah User
                </a>
            </div>

            <!-- Tabel List User -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-sm rounded-lg border-separate border-spacing-0">
                    <thead>
                        <tr class="bg-gradient-to-r from-gray-100 to-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-4 px-6 text-left font-semibold">No.</th>
                            <th class="py-4 px-6 text-left font-semibold">Nama</th>
                            <th class="py-4 px-6 text-left font-semibold">Email</th>
                            <th class="py-4 px-6 text-center font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm">
                        @foreach($data as $no => $item)
                        <tr class="hover:bg-gray-100 transition duration-150 ease-in-out border-b border-gray-200">
                            <td class="py-4 px-6">{{ $no + 1 }}</td>
                            <td class="py-4 px-6">{{ $item->name }}</td>
                            <td class="py-4 px-6">{{ $item->email }}</td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex justify-center space-x-4">
                                    <!-- Tombol Edit -->
                                    <a href="{{ url('user/'.$item->id.'/edit') }}" class="bg-yellow-500 text-white py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-200">
                                        Edit
                                    </a>
                                    <!-- Tombol Delete -->
                                    <form action="{{ url('user', $item->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-lg shadow-md hover:bg-red-600 transition duration-200">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
