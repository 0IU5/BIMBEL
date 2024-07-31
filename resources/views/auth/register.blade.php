<!-- Header -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        .custom-bg {
            background-image: url('./img/regist2.jpeg');
            background-size: cover; 
            background-position: center; 
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        /* Autofill background color fix */
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 1000px #1a202c inset; /* Change #1a202c to your desired background color */
            -webkit-text-fill-color: #ffffff; /* Change #ffffff to your desired text color */
        }
    </style>
</head>
<body>
    <div class="custom-bg bg-gray-900 min-h-screen flex items-center justify-center">
        <div class="p-8 bg-gray-500 bg-opacity-50 backdrop-blur-sm rounded-md shadow-md w-full max-w-md mt-16 mb-16">
            <h1 class="mb-6 text-3xl font-semibold text-center text-white">Register</h1>
            @if (session('success'))
            <div id="alert" class="bg-green-700 text-white py-2 px-4 mb-4 rounded flex justify-between items-center">
                {{ session('success') }}
                <button onclick="document.getElementById('alert').style.display='none'" class="text-white ml-4">&times;</button>
            </div>
            @endif  
            <form action="{{ route('register.save') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <h2 class="text-white">Username</h2>
                    <label class="input input-bordered flex items-center gap-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 16 16"
                            fill="currentColor"
                            class="h-4 w-4 opacity-70">
                            <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                        </svg>
                        <input name="name" type="text" placeholder="Name" class=" text-white w-full p-2 rounded-md @error('name') border-red-600 @enderror" />
                        @error('name')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div>
                    <h2 class="text-white">Email</h2>
                    <label class="input input-bordered flex items-center gap-2">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 16 16"
                        fill="currentColor"
                        class="h-4 w-4 opacity-70">
                        <path
                        d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                        <path
                        d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                    </svg>
                    <input name="email" type="email" placeholder="Email Address" class=" text-white w-full p-2 @error('email') border-red-600 @enderror" />
                    @error('email')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                    </label>
                </div>
                <div>
                    <h2 class="text-white">Password</h2>
                    <label class="input input-bordered flex items-center gap-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 16 16"
                            fill="currentColor"
                            class="h-4 w-4 opacity-70">
                            <path
                            fill-rule="evenodd"
                            d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                            clip-rule="evenodd" />
                        </svg>
                        <input name="password" type="password" placeholder="Enter Password" class="text-white w-full p-2 @error('password') border-red-600 @enderror" />
                        @error('password')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div>
                    <h2 class="text-white">Confirm Password</h2>
                    <label class="input input-bordered flex items-center gap-2">
                    <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 16 16"
                            fill="currentColor"
                            class="h-4 w-4 opacity-70">
                            <path
                            fill-rule="evenodd"
                            d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                            clip-rule="evenodd" />
                        </svg>
                    <input name="password_confirmation" type="password" placeholder="Confirm Password" class="text-white w-full p-2 @error('password_confirmation') border-red-600 @enderror" />
                    @error('password_confirmation')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="w-full py-2 bg-gray-600 hover:bg-gray-800 text-white rounded-badge focus:outline-none focus:ring-2 focus:ring-offset-2">Register Account</button>
                </div>
                <p class="mt-4 text-center text-sm text-white">Already have an account?
                    <a href="{{ route('login') }}" class="font-bold text-white hover:text-blue-700 no-underline">Login</a>
                </p>
            </form>
        </div>
    </div>

    <script>
    // Hide alerts after 5 seconds
    setTimeout(() => {
        const alert = document.getElementById('alert');
        if (alert) alert.style.display = 'none';
    }, 5000);
    </script>
</body>
</html>
