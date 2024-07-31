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
    <div class="bg-white bg-opacity-60 backdrop-filter backdrop-blur-md shadow-xl rounded-lg p-8 sm:p-18 relative mx-auto w-full max-w-3xl" style="box-shadow: 0 0 20px 5px rgba(0, 255, 255, 0.5);">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-700">Buat Feedback</h1>
        <form action="{{ route('feedbacks.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="feedback" class="block text-sm font-medium text-gray-700">Feedback</label>
                <textarea name="feedback" id="feedback" rows="5" placeholder="Please Your Feedback..." class="input input-bordered input-info mt-1 block w-full h-40 p-4 @error('feedback') border-red-600 @enderror"></textarea>
                @error('feedback')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
