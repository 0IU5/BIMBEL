@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-4">
    @if (session('status'))
        <div id="alert" class="bg-green-700 text-white py-2 px-4 mb-4 rounded flex justify-between items-center">
            {{ session('status') }}
            <button onclick="document.getElementById('alert').style.display='none'" class="text-white ml-4">&times;</button>
        </div>
    @endif
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
        <div id="update-alert" class="bg-green-700 text-white py-2 px-4 mb-4 rounded flex justify-between items-center">
            {{ session('delete') }}
            <button onclick="document.getElementById('update-alert').style.display='none'" class="text-white ml-4">&times;</button>
        </div>
    @endif
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">List Service</h1>
        <a href="{{ route('services.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">New Add Service</a>
    </div>
    <table class="bg-white bg-opacity-20 backdrop-filter backdrop-blur-md shadow-xl rounded-lg w-full" style="box-shadow: 0 0 20px 5px rgba(0, 255, 255, 0.5);">
        <thead>
            <tr>
                <th class="py-2">Service</th>
                <th class="py-2">Email</th>
                <th class="py-2">Class</th>
                <th class="py-2">Paket</th>
                <th class="py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td class="py-4 px-10 pl-8">{{ $service->service }}</td>
                    <td class="py-4 px-10 pl-8">{{ $service->email }}</td>
                    <td class="py-4 px-10 pl-8">{{ $service->kelas }}</td>
                    <td class="py-4 px-10 pl-8">{{ $service->paket }}</td>
                    <td class="py-4 px-10 pl-8 flex items-center space-x-2">
                        <a href="{{ route('services.edit', $service->id_service) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">Edit</a>
                        <button type="button" onclick="showModal({{ $service->id_service }})" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">Hapus</button>
                    </td>
                </tr>

                <!-- Modal -->
                <div id="popup-modal-{{ $service->id_service }}" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
                    <div class="relative p-4 w-full max-w-md mx-auto bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="hideModal({{ $service->id_service }})">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>    
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this service?</h3>
                            <form action="{{ route('services.destroy', $service->id_service) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Yes, I'm sure
                                </button>
                            </form>
                            <button onclick="hideModal({{ $service->id_service }})" type="button" class="py-2.5 px-5 ml-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function showModal(serviceId) {
        document.getElementById('popup-modal-' + serviceId).classList.remove('hidden');
    }

    function hideModal(serviceId) {
        document.getElementById('popup-modal-' + serviceId).classList.add('hidden');
    }
</script>
@endsection
