@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-4">
    @if (session('success'))
        <div id="alert" class="bg-green-700 text-white py-2 px-4 mb-4 rounded flex justify-between items-center">
            {{ session('success') }}
            <button onclick="document.getElementById('alert').style.display='none'" class="text-white ml-4">&times;</button>
        </div>
    @endif
    @if (session('update'))
        <div id="update-alert" class="bg-green-700 text-white py-2 px-4 mb-4 rounded flex justify-between items-center">
            {{ session('update') }}
            <button onclick="document.getElementById('update-alert').style.display='none'" class="text-white ml-4">&times;</button>
        </div>
    @endif
    @if (session('delete'))
        <div id="delete-alert" class="bg-green-700 text-white py-2 px-4 mb-4 rounded flex justify-between items-center">
            {{ session('delete') }}
            <button onclick="document.getElementById('delete-alert').style.display='none'" class="text-white ml-4">&times;</button>
        </div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">List Schedule</h1>
        <a href="{{ route('jadwals.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add New</a>
    </div>
        <table class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-md shadow-xl rounded-lg w-full" style="box-shadow: 0 0 20px 5px rgba(0, 255, 255, 0.5);">
            <thead>
                <tr>
                    <th class="py-2 px-4 ">Name</th>
                    <th class="py-2 px-4 ">Paket</th>
                    <th class="py-2 px-4 ">Start</th>
                    <th class="py-2 px-4 ">End</th>
                    <th class="py-2 px-4 ">User</th> 
                    <th class="py-2 px-4 ">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwals as $jadwal)
                <tr>
                    <td class="py-4 px-4 border-b">{{ $jadwal->nama }}</td>
                    <td class="py-4 px-4 border-b">{{ $jadwal->paket }}</td>
                    <td class="py-4 px-4 border-b">{{ $jadwal->start_time }}</td>
                    <td class="py-4 px-4 border-b">{{ $jadwal->end_time }}</td>
                    <td class="py-4 px-4 border-b">{{ $jadwal->user->name }}</td> <!-- Tampilkan nama user -->
                    <td class="py-4 px-4 border-b flex space-x-2">
                        <a href="{{ route('jadwals.edit', $jadwal->id_jadwal) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                        <button type="button" onclick="showModal({{ $jadwal->id_jadwal }})" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">Hapus</button>
                    </td>
                </tr>
                <!-- Modal -->
                <div id="popup-modal-{{ $jadwal->id_jadwal }}" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
                    <div class="relative p-4 w-full max-w-md mx-auto bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="hideModal({{ $jadwal->id_jadwal }})">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>    
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this schedule?</h3>
                            <form action="{{ route('jadwals.destroy', $jadwal->id_jadwal) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Yes, I'm sure
                                </button>
                            </form>
                            <button onclick="hideModal({{ $jadwal->id_jadwals }})" type="button" class="py-2.5 px-5 ml-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    // Hide alerts after 5 seconds
    setTimeout(() => {
        const alert = document.getElementById('alert');
        if (alert) alert.style.display = 'none';
        const updateAlert = document.getElementById('update-alert');
        if (updateAlert) updateAlert.style.display = 'none';
        const deleteAlert = document.getElementById('delete-alert');
        if (deleteAlert) deleteAlert.style.display = 'none';
    }, 3000);

    function showModal(serviceId) {
        document.getElementById('popup-modal-' + serviceId).classList.remove('hidden');
    }

    function hideModal(serviceId) {
        document.getElementById('popup-modal-' + serviceId).classList.add('hidden');
    }
</script>
@endsection
