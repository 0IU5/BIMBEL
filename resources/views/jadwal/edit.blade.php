@extends('layouts.app')

@section('content')
<head>
    <!-- Include Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Autofill background color fix */
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 1000px #1a202c inset;
            -webkit-text-fill-color: #ffffff;
        }

        .relative {
            position: relative;
        }

        .input {
            padding-right: 2.5rem;
        }

        .fa-calendar-alt {
            font-size: 1.2rem;
        }
    </style>
</head>

<div class="container flex justify-center items-center mx-auto min-h-screen">
    <div class="bg-white bg-opacity-60 backdrop-filter backdrop-blur-md shadow-xl rounded-lg p-8 sm:p-24 relative mx-auto" style="box-shadow: 0 0 20px 5px rgba(0, 255, 255, 0.5);">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-700">Edit Timetable</h1>

        @if ($errors->any())
            <div class="bg-red-500 text-white py-2 px-4 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('jadwals.update', $jadwal) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $jadwal->nama) }}" class="input input-bordered input-info mt-1 block w-full @error('nama') border-red-600 @enderror" required>
                @error('nama')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="paket" class="block text-sm font-medium text-gray-700">Paket</label>
                <select name="paket" id="paket" class="select select-primary mt-1 block w-full">
                    @foreach ($pakets as $paket)
                        <option value="{{ $paket }}" {{ $paket == $jadwal->paket ? 'selected' : '' }}>{{ $paket }}</option>
                    @endforeach
                </select>
            </div>
            <div class="relative">
                <label for="start_time" class="block text-sm font-medium text-gray-700">Start</label>
                <input type="text" name="start_time" id="start_time" value="{{ old('start_time', \Carbon\Carbon::parse($jadwal->start_time)->format('Y-m-d H:i')) }}" class="input input-bordered input-info mt-1 block w-full pr-10 @error('start_time') border-red-600 @enderror" required placeholder="Select date and time">
                <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer" id="start-calendar-icon">
                    <i class="fas fa-calendar-alt text-gray-500"></i>
                </span>
                @error('start_time')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative">
                <label for="end_time" class="block text-sm font-medium text-gray-700">End</label>
                <input type="text" name="end_time" id="end_time" value="{{ old('end_time', \Carbon\Carbon::parse($jadwal->end_time)->format('Y-m-d H:i')) }}" class="input input-bordered input-info mt-1 block w-full pr-10 @error('end_time') border-red-600 @enderror" required placeholder="Select date and time">
                <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer" id="end-calendar-icon">
                    <i class="fas fa-calendar-alt text-gray-500"></i>
                </span>
                @error('end_time')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="btn bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">Save</button>
                <a href="{{ route('jadwals.index') }}" class="relative inline-block text-sm font-bold text-blue-500 hover:text-blue-800 w-full py-4">Back</a>
            </div>
        </form>
    </div>
</div>

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const startTimeInput = document.querySelector("#start_time");
        const endTimeInput = document.querySelector("#end_time");

        flatpickr(startTimeInput, {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            minDate: "today",
            locale: "id"
        });

        flatpickr(endTimeInput, {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            minDate: "today",
            locale: "id",
            onChange: function(selectedDates, dateStr, instance) {
                const startDate = new Date(startTimeInput._flatpickr.selectedDates[0]);
                const endDate = new Date(dateStr);

                if (endDate <= startDate) {
                    setTimeout(function() {
                        alert("End time must be after the start time.");
                    }, 2000);
                }
            }
        });

        document.getElementById('start-calendar-icon').addEventListener('click', function() {
            startTimeInput._flatpickr.open();
        });

        document.getElementById('end-calendar-icon').addEventListener('click', function() {
            endTimeInput._flatpickr.open();
        });

        // Hide alerts after 5 seconds
        setTimeout(() => {
            const alert = document.querySelector('.bg-red-500');
            if (alert) alert.style.display = 'none';
        }, 5000);
    });
    </script>
@endsection
@endsection
