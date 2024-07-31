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
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-700">Add New Service</h1>
        <form action="{{ route('services.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="service" class="block text-sm font-medium text-gray-700">Service</label>
                <select id="service" name="service" class="select select-primary mt-1 block w-full">
                    @foreach($services as $service)
                    <option value="{{ $service }}">{{ $service }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="input input-bordered input-info mt-1 block w-full  @error('email') border-red-600 @enderror">
                @error('email')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="kelas" class="block text-sm font-medium text-gray-700">Class</label>
                <select id="kelas" name="kelas" class="select select-primary mt-1 block w-full">
                    @foreach($kelas as $k)
                    <option value="{{ $k }}">{{ $k }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="paket" class="block text-sm font-medium text-gray-700">Paket</label>
                <select id="paket" name="paket" class="select select-primary mt-1 block w-full">
                    @foreach($pakets as $paket)
                    <option value="{{ $paket }}">{{ $paket }}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200" onclick="submitForm()">Save</button>
                <a href="{{ route('services.index') }}" class="relative inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800 w-full py-4">Back</a>
            </div>

            <script>
                function submitForm() {
                    // Assuming form submission logic here, e.g., using AJAX
                    // Show the success modal
                    document.getElementById('success_modal').classList.remove('hidden');
                }
            </script>
        </form>
    </div>
</div>
@endsection
