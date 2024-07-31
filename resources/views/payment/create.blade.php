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
            -webkit-box-shadow: 0 0 0 1000px #1a202c inset; /* Change #1a202c to your desired background color */
            -webkit-text-fill-color: #ffffff; /* Change #ffffff to your desired text color */
        }

        .relative {
            position: relative;
        }

        .input {
            padding-right: 2.5rem; /* Adjust based on icon size */
        }

        .fa-calendar-alt {
            font-size: 1.2rem; /* Adjust size as needed */
        }
    </style>
</head>
<div class="container flex justify-center items-center mx-auto min-h-screen">
    <div class="bg-white bg-opacity-60 backdrop-filter backdrop-blur-md shadow-xl rounded-lg p-8 sm:p-24 relative mx-auto" style="box-shadow: 0 0 20px 5px rgba(0, 255, 255, 0.5);">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-700">Add New Payment</h1>
        @if (session('success'))
            <div id="alert" class="bg-green-500 text-white py-2 px-4 mb-4 rounded flex justify-between items-center">
                {{ session('success') }}
                <button onclick="document.getElementById('alert').style.display='none'" class="text-white ml-4">&times;</button>
            </div>
        @endif

        @if (session('data_added'))
            <div id="data-added-alert" class="bg-blue-500 text-white py-2 px-4 mb-4 rounded flex justify-between items-center">
                {{ session('data_added') }}
                <button onclick="document.getElementById('data-added-alert').style.display='none'" class="text-white ml-4">&times;</button>
            </div>
        @endif

        <form action="{{ route('payments.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="customer_name" class="block text-sm font-medium text-gray-700">Name Customer</label>
                <input type="text" name="customer_name" id="customer_name" class="input input-bordered input-info mt-1 block w-full @error('customer_name') border-red-600 @enderror" value="{{ old('customer_name') }}">
                @error('customer_name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="package_type" class="block text-sm font-medium text-gray-700">Paket</label>
                <select name="package_type" id="package_type" class="select select-primary mt-1 block w-full @error('package_type') border-red-600 @enderror">
                    <option value="">Choice Paket</option>
                    <option value="Paket A" {{ old('package_type') == 'Paket A' ? 'selected' : '' }}>Paket A (75.000)</option>
                    <option value="Paket B" {{ old('package_type') == 'Paket B' ? 'selected' : '' }}>Paket B (100.000)</option>
                    <option value="Paket C" {{ old('package_type') == 'Paket C' ? 'selected' : '' }}>Paket C (150.000)</option>
                </select>
                @error('package_type')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                <input type="text" name="amount" id="amount" class="input input-bordered input-info mt-1 block w-full @error('amount') border-red-600 @enderror" value="{{ old('amount') }}" readonly>
                @error('amount')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="jenis_payment" class="block text-sm font-medium text-gray-700">Payment</label>
                <select name="jenis_payment" id="jenis_payment" class="select select-primary mt-1 block w-full @error('jenis_payment') border-red-600 @enderror">
                    <option value="">Choice Payment</option>
                    <option value="tunai" {{ old('jenis_payment') == 'tunai' ? 'selected' : '' }}>Tunai</option>
                    <option value="card" {{ old('jenis_payment') == 'card' ? 'selected' : '' }}>Card</option>
                    <option value="debit" {{ old('jenis_payment') == 'debit' ? 'selected' : '' }}>Debit</option>
                </select>
                @error('jenis_payment')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative">
                <label for="payment_date" class="block text-sm font-medium text-gray-700">Payment Date</label>
                <input type="text" name="payment_date" id="payment_date" class="input input-bordered input-info mt-1 block w-full pr-10 @error('payment_date') border-red-600 @enderror" value="{{ old('payment_date') }}" placeholder="Select date and time">
                <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer" id="calendar-icon">
                    <i class="fas fa-calendar-alt text-gray-500"></i>
                </span>
                @error('payment_date')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="btn bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">Save</button>
                <a href="{{ route('payments.index') }}" class="relative inline-block text-sm font-bold text-blue-500 hover:text-blue-800 w-full py-4">Back</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#payment_date", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    minDate: "today", // Ini memastikan pengguna tidak bisa memilih tanggal di masa lalu
    locale: "id",
    onChange: function(selectedDates, dateStr, instance) {
        // Menyaring tanggal yang lebih awal dari waktu sekarang
        let now = new Date();
        let selectedDate = new Date(dateStr);
        if (selectedDate < now) {
            setTimeout(function() {
                    alert("The selected date and time must be now or in the future.");
                }, 5000); // Delay before clearing the field
        }
    }
});

    // Open Flatpickr calendar when calendar icon is clicked
    document.getElementById('calendar-icon').addEventListener('click', function() {
        calendar.open(); // Opens the calendar
    });

    document.getElementById('package_type').addEventListener('change', function() {
        const prices = {
            'Paket A': 75000,
            'Paket B': 100000,
            'Paket C': 150000
        };
        const packageType = this.value;
        const formattedPrice = `RP ${new Intl.NumberFormat('id-ID').format(prices[packageType] || 0)}`;
        document.getElementById('amount').value = formattedPrice;
    });

    // Hide alerts after 5 seconds
    setTimeout(() => {
        const alert = document.getElementById('alert');
        if (alert) alert.style.display = 'none';
        const dataAddedAlert = document.getElementById('data-added-alert');
        if (dataAddedAlert) dataAddedAlert.style.display = 'none';
    }, 5000);
</script>
@endsection
