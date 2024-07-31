@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-4 px-4">
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
        <h1 class="text-2xl font-bold">List Feedback</h1>
        <a href="{{ route('feedbacks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add New</a>
    </div>
    <table class="min-w-full bg-white bg-opacity-20 backdrop-filter backdrop-blur-md shadow-xl rounded-lg" style="box-shadow: 0 0 20px 5px rgba(0, 255, 255, 0.5);">
        <thead>
            <tr>
                <th class="py-2 px-4 ">Name</th>
                <th class="py-2 px-4 ">Email</th>
                <th class="py-2 px-4 ">Feedback</th>
                <th class="py-2 px-4 ">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedbacks as $feedback)
            <tr>
                <td class="py-4 px-4 border-b">{{ $feedback->name }}</td>
                <td class="py-4 px-4 border-b">{{ $feedback->email }}</td>
                <td class="py-4 px-4 border-b">{{ $feedback->feedback }}</td>
                <td class="py-4 px-4 border-b flex space-x-2">
                    <a href="{{ route('feedbacks.edit', $feedback->id_feedback) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('feedbacks.destroy', $feedback->id_feedback) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
