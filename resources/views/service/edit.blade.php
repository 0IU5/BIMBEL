@extends('layouts.app')

@section('content')
<style>
/* Autofill background color fix */
input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0 1000px #1a202c inset; /* Change #1a202c to your desired background color */
    -webkit-text-fill-color: #ffffff; /* Change #ffffff to your desired text color */
}
</style>
<div class="container flex justify-center items-center mx-auto min-h-screen">
    <div class="bg-white bg-opacity-60 backdrop-filter backdrop-blur-md shadow-xl rounded-lg p-8 sm:p-18 relative mx-auto" style="box-shadow: 0 0 20px 5px rgba(0, 255, 255, 0.5);">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-700">Edit Service</h1>
        <form action="{{ route('services.update', $service->id_service) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="service" class="block text-sm font-medium text-gray-700">Service</label>
                <select id="service" name="service" class="select select-primary mt-1 block w-full">
                    @foreach($services as $s)
                    <option value="{{ $s }}" @if($service->service == $s) selected @endif>{{ $s }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="input input-bordered input-info mt-1 block w-full" value="{{ $service->email }}" required>
            </div>
            <div>
                <label for="kelas" class="block text-sm font-medium text-gray-700">Class</label>
                <select id="kelas" name="kelas" class="select select-primary mt-1 block w-full">
                    @foreach($kelas as $k)
                    <option value="{{ $k }}" @if($service->kelas == $k) selected @endif>{{ $k }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="paket" class="block text-sm font-medium text-gray-700">Paket</label>
                <select id="paket" name="paket" class="select select-primary mt-1 block w-full">
                    @foreach($pakets as $p)
                    <option value="{{ $p }}" @if($service->paket == $p) selected @endif>{{ $p }}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">Update</button>
                <a href="{{ route('services.index') }}" class="relative inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800 w-full py-4">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection
