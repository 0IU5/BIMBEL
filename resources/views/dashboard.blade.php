@extends('layouts.app')
<head>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
</head>
@section('content')
    <!-- Main Content -->
    <div class="flex-1 p-6 bg-gray-700">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-4xl font-bold text-white">Dashboard</h2>
                <p id="current-date" class="text-white"></p>
            </div>
            <div class="text-sm text-white">2024</div>
        </div>

        <!-- Welcome Section -->
        <div class="flex items-center bg-white p-6 rounded-lg mb-8 dark:bg-gray-800" style="box-shadow: 0 0 20px 5px rgba(128, 128, 128, 0.5);">
            <div>
                <h3 class="text-6xl font-bold text-white">Hello, {{ auth()->user()->name }}</h3>
                <p class="text-2xl text-white">nice to see you again!!!</p>
            </div>
        </div>

        <!-- Activity Section -->
        <div class="mb-8">
            <div class="bg-white p-6 rounded-lg dark:bg-gray-800" style="box-shadow: 0 0 20px 5px rgba(128, 128, 128, 0.5);">
                <h4 class="text-xl font-bold text-white mb-4">Activity</h4>
                <div class="flex carousel carousel-center bg-slate-400 rounded-box w-full p-4 space-x-2">
                    <div class="carousel-item">
                        <img
                        src="./img-dashb/act/1.jpeg"
                        class="rounded-box w-72 h-72" />
                    </div>
                    <div class="carousel-item">
                        <img
                        src="./img-dashb/act/2.jpeg"
                        class="rounded-box w-72 h-72" />
                    </div>
                    <div class="carousel-item">
                        <img
                        src="./img-dashb/act/3.jpeg"
                        class="rounded-box w-72 h-72" />
                    </div>
                    <div class="carousel-item">
                        <img
                        src="./img-dashb/act/4.jpeg"
                        class="rounded-box w-72 h-72" />
                    </div>
                    <div class="carousel-item">
                        <img
                        src="./img-dashb/act/5.jpeg"
                        class="rounded-box w-72 h-72" />
                    </div>
                    <div class="carousel-item">
                        <img
                        src="./img-dashb/act/1.jpeg"
                        class="rounded-box w-72 h-72" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Student Section -->
        <div class="mb-8">
            <div class="bg-white p-6 rounded-lg dark:bg-gray-800" style="box-shadow: 0 0 20px 5px rgba(128, 128, 128, 0.5);">
                <h4 class="text-xl font-bold text-white mb-4">Student</h4>
                <div class="carousel carousel-center bg-slate-400 rounded-box w-full space-x-4 p-4">
                    <div class="carousel-item">
                        <img
                        src="./img-dashb/std/1.jpeg"
                        class="rounded-box w-72 h-72" />
                    </div>
                    <div class="carousel-item">
                        <img
                        src="./img-dashb/std/2.jpeg"
                        class="rounded-box w-72 h-72" />
                    </div>
                    <div class="carousel-item">
                        <img
                        src="./img-dashb/std/3.jpeg"
                        class="rounded-box w-72 h-72" />
                    </div>
                    <div class="carousel-item">
                        <img
                        src="./img-dashb/std/4.jpeg"
                        class="rounded-box w-72 h-72" />
                    </div>
                    <div class="carousel-item">
                        <img
                        src="./img-dashb/std/5.jpeg"
                        class="rounded-box w-72 h-72" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Projects Section -->
        <div class="grid grid-cols-3 gap-6 mb-5">
            <div class="bg-red-500 bg-opacity-60 backdrop-filter backdrop-blur-md p-6 rounded-lg" style="box-shadow: 0 0 20px 5px rgba(255, 0, 0, 0.5);">
                <h5 class="text-lg font-bold text-white mb-4">Paket A</h5>
                <p class="text-white">Paket A (1 mapel, konseling private)</p>
                <p class="text-white font-bold">Rp 75,000</p>
            </div>
            <div class="bg-yellow-500 bg-opacity-60 backdrop-filter backdrop-blur-md p-6 rounded-lg" style="box-shadow: 0 0 20px 5px rgba(255, 255, 0, 0.5);">
                <h5 class="text-lg font-bold text-white mb-4">Paket B</h5>
                <p class="text-white">Paket B (2 mapel, konseling private, robo guru)</p>
                <p class="text-white font-bold">Rp 100,000</p>
            </div>
            <div class="bg-green-500 bg-opacity-60 backdrop-filter backdrop-blur-md p-6 rounded-lg" style="box-shadow: 0 0 20px 5px rgba(0, 255, 0, 0.5);">
                <h5 class="text-lg font-bold text-white mb-4">Paket C</h5>
                <p class="text-white">Paket C (3 mapel, konseling private, robo guru, ruang belajar, kelas elite)</p>
                <p class="text-white font-bold">Rp 150,000</p>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
    // Buat array nama-nama hari dan bulan
    const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    // Ambil tanggal hari ini
    const now = new Date();
    const dayName = days[now.getDay()];
    const day = String(now.getDate()).padStart(2, '0');
    const monthName = months[now.getMonth()];
    const year = now.getFullYear();

    // Format tanggal
    const formattedDate = `${dayName}, ${day} ${monthName} ${year}`;

    // Set tanggal ke elemen HTML
    document.getElementById('current-date').innerText = formattedDate;
});
</script>
@endsection
