<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0" defer></script>
</head>
<body class="flex flex-col">
    <div class="navbar bg-base-100 mx-auto px-10">  
        <div class="flex-1 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="justify-start" width="28" height="28" viewBox="0 0 24 24" style="fill: rgba(228, 224, 15, 1); filter: drop-shadow(0 0 15px rgba(255, 255, 0, 0.8));">
                <path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"/>
            </svg>
                <a href="{{ route('dashboard') }}" class="btn btn-ghost text-2xl -ml-3">StarClass</a>
                <!-- Hamburger button (aligned next to StarClass) -->
                <div x-data="{ open: false }" class="-ml-1 relative">
                    <button
                        @click="open = !open"
                        type="button"
                        class="p-1 w-10 h-10 text-sm text-gray-500 rounded-lg transition-transform duration-300 ease-in-out transform hover:scale-105 hover:text-indigo-500 hover:shadow-lg focus:outline-none"
                        :class="{ 'translate-x-24': open }"
                        aria-controls="navbar-hamburger"
                        aria-expanded="false">

                        <span class="sr-only">Open main menu</span>
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(243, 234, 234, 1);">
                            <path d="m13.061 4.939-2.122 2.122L15.879 12l-4.94 4.939 2.122 2.122L20.121 12z"></path>
                            <path d="M6.061 19.061 13.121 12l-7.06-7.061-2.122 2.122L8.879 12l-4.94 4.939z"></path>
                        </svg>
                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(243, 234, 234, 1);">
                            <path d="m8.121 12 4.94-4.939-2.122-2.122L3.879 12l7.06 7.061 2.122-2.122z"></path>
                            <path d="M17.939 4.939 10.879 12l7.06 7.061 2.122-2.122L15.121 12l4.94-4.939z"></path>
                        </svg>   
                        </svg>
                    </button>
                    <!-- Sidebar -->
                    <aside x-show="open" x-transition:enter="transition transform duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition transform duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" @click.away="open = false" id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
                        <div class="h-full px-3 pb-4 overflow-y-auto relative -mt-16 bg-white dark:bg-gray-800">
                        <div class="flex items-center justify-start space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" style="fill: rgba(228, 224, 15, 1); filter: drop-shadow(0 0 15px rgba(255, 255, 0, 0.8));">
                                <path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"/>
                            </svg>
                            <a href="{{ route('dashboard') }}" class="btn btn-ghost text-2xl">StarClass</a>
                        </div>
                            <ul class="space-y-2 font-medium relative mt-3">
                                <li>
                                    <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                                        </svg>
                                        <span class="ms-3">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('services.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                            <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                                        </svg>
                                        <span class="flex-1 ms-3 whitespace-nowrap">Services</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('jadwals.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 18">
                                        <path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z"></path>
                                        <path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z"></path>
                                    </svg>
                                        <span class="flex-1 ms-3 whitespace-nowrap">Schedule</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('payments.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 18 20">
                                        <path d="M20 7V5c0-1.103-.897-2-2-2H5C3.346 3 2 4.346 2 6v12c0 2.201 1.794 3 3 3h15c1.103 0 2-.897 2-2V9c0-1.103-.897-2-2-2zm-2 9h-2v-4h2v4zM5 7a1.001 1.001 0 0 1 0-2h13v2H5z"></path>
                                    </svg>
                                        <span class="flex-1 ms-3 whitespace-nowrap">Payment</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('feedbacks.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 18">
                                        <path d="M4 21h1V8H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2zM20 8h-7l1.122-3.368A2 2 0 0 0 12.225 2H12L7 7.438V21h11l3.912-8.596L22 12v-2a2 2 0 0 0-2-2z"></path>
                                    </svg>
                                        <span class="flex-1 ms-3 whitespace-nowrap">Feedback</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>

            <!-- Profile dropdown (right-aligned) -->
            <div class="flex-none">
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(243, 234, 234, 1);">
                            <path d="M12 2C6.579 2 2 6.579 2 12s4.579 10 10 10 10-4.579 10-10S17.421 2 12 2zm0 5c1.727 0 3 1.272 3 3s-1.273 3-3 3c-1.726 0-3-1.272-3-3s1.274-3 3-3zm-5.106 9.772c.897-1.32 2.393-2.2 4.106-2.2h2c1.714 0 3.209.88 4.106 2.2C15.828 18.14 14.015 19 12 19s-3.828-.86-5.106-2.228z"></path>
                        </svg>
                    </div>
                    <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                        <li class="mb-2">
                            <span class="text-sm">{{ auth()->user()->name }}</span>
                        </li>
                        <li>
                            <a href="{{ route('profile') }}" class="justify-between">
                                Profile
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgba(78, 75, 75, 1);"><path d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z"></path></svg>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="justify-between">Log out
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgba(128, 128, 128, 0.5);"><path d="M16 13v-2H7V8l-5 4 5 4v-3z"></path><path d="M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z"></path></svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-grow">
            <h1 class="text-3xl">@yield('title')</h1>
            <div>@yield('content')</div>
        </div>

        <!-- footer -->
        <footer class="relative bg-white lg:grid lg:grid-cols-5 dark:bg-gray-800 mt-80" style="box-shadow: 0 0 20px 5px rgba(128, 128, 128, 0.5);">
        <div class="relative block h-32 lg:col-span-2 lg:h-full">
            <img
            src="https://images.unsplash.com/photo-1642370324100-324b21fab3a9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1548&q=80"
            alt=""
            class="absolute inset-0 h-full w-full object-cover"
            />
        </div>

        <div class="px-4 py-16 sm:px-6 lg:col-span-3 lg:px-8">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2">
            <div>
                <p>
                <span
                    class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400"
                >
                    Call us
                </span>

                <a
                    href="https://wa.me/6282123489847"
                    class="block text-2xl font-medium text-gray-900 hover:opacity-75 sm:text-3xl dark:text-white"
                >
                    082123489847
                </a>
                </p>

                <ul class="mt-8 space-y-1 text-sm text-gray-700 dark:text-gray-200">
                <li>Monday to Friday: 24 Hours</li>
                </ul>

                <ul class="mt-8 flex gap-6">
                <li>
                    <a
                    href="https://www.facebook.com/satrio.b.pinayungan.7/"
                    rel="noreferrer"
                    target="_blank"
                    class="text-gray-700 transition hover:opacity-75 dark:text-gray-200"
                    >
                    <span class="sr-only">Facebook</span>

                    <svg
                        class="h-6 w-6"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                        aria-hidden="true"
                    >
                        <path
                        fill-rule="evenodd"
                        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                        clip-rule="evenodd"
                        />
                    </svg>
                    </a>
                </li>

                <li>
                    <a
                    href="https://www.instagram.com/riouu._/"
                    rel="noreferrer"
                    target="_blank"
                    class="text-gray-700 transition hover:opacity-75 dark:text-gray-200"
                    >
                    <span class="sr-only">Instagram</span>

                    <svg
                        class="h-6 w-6"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                        aria-hidden="true"
                    >
                        <path
                        fill-rule="evenodd"
                        d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                        clip-rule="evenodd"
                        />
                    </svg>
                    </a>
                </li>

                <li>
                    <a
                    href="https://twitter.com/1rio_oir1"
                    rel="noreferrer"
                    target="_blank"
                    class="text-gray-700 transition hover:opacity-75 dark:text-gray-200"
                    >
                    <span class="sr-only">Twitter</span>

                    <svg
                        class="h-6 w-6"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                        aria-hidden="true"
                    >
                        <path
                        d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"
                        />
                    </svg>
                    </a>
                </li>

                <li>
                    <a
                    href="https://github.com/0IU5"
                    rel="noreferrer"
                    target="_blank"
                    class="text-gray-700 transition hover:opacity-75 dark:text-gray-200"
                    >
                    <span class="sr-only">GitHub</span>

                    <svg
                        class="h-6 w-6"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                        aria-hidden="true"
                    >
                        <path
                        fill-rule="evenodd"
                        d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                        clip-rule="evenodd"
                        />
                    </svg>
                    </a>
                </li>
                </ul>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                <p class="font-medium text-gray-900 dark:text-white">Our Services</p>

                <ul class="mt-6 space-y-4 text-sm">
                    <li>
                    <a
                        href="{{ route('services.index') }}"
                        class="text-gray-700 transition hover:opacity-75 dark:text-gray-200"
                    >
                        Order Class
                    </a>
                    </li>
                    <li>
                    <a
                        href="{{ route('jadwals.index') }}"
                        class="text-gray-700 transition hover:opacity-75 dark:text-gray-200"
                    >
                        Booking Schedule
                    </a>
                    </li>
                    <li>
                    <a
                        href="{{ route('payments.index') }}"
                        class="text-gray-700 transition hover:opacity-75 dark:text-gray-200"
                    >
                        Payment
                    </a>
                    </li>
                    <li>
                    <a
                        href="{{ route('feedbacks.index') }}"
                        class="text-gray-700 transition hover:opacity-75 dark:text-gray-200"
                    >
                        Feedback
                    </a>
                    </li>
                </ul>
                </div>

                <div>
                <p class="font-medium text-gray-900 dark:text-white">Company</p>

                <ul class="mt-6 space-y-4 text-sm">
                    <li>
                    <a
                        href="{{ route('profile') }}"
                        class="text-gray-700 transition hover:opacity-75 dark:text-gray-200"
                    >
                        Profile
                    </a>
                    </li>
                </ul>
                </div>
            </div>
            </div>

            <div class="mt-12 border-t border-gray-100 pt-12 dark:border-gray-800">
            </div>
        </div>
        </footer>
        <!-- END footer -->
    </div>
</body>
</html>