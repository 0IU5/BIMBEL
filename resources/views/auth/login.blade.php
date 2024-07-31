<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        .custom-bg {
            background-image: url('./img/login.png');
            background-size: cover; 
            background-position: center; 
            object-fit: cover;
        }

        /* Autofill background color fix */
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 1000px #1a202c inset; /* Change #1a202c to your desired background color */
            -webkit-text-fill-color: #ffffff; /* Change #ffffff to your desired text color */
        }
    </style>
</head>
<body class="custom-bg">    
    <div class="relative flex flex-col justify-center h-screen overflow-hidden">
        <div class="w-full p-6 m-auto bg-white rounded-md shadow-md ring-2 ring-gray-800/50 lg:max-w-xl">
            <h1 class="text-3xl font-semibold text-center text-gray-800">Login</h1>
            @if (session('success'))
            <div id="alert" class="bg-green-700 text-white py-2 px-4 mb-2 rounded flex justify-between items-center">
                {{ session('success') }}
                <button onclick="document.getElementById('alert').style.display='none'" class="text-white ml-4">&times;</button>
            </div>
            @endif  
            <form action="{{ route('login.action') }}" method="POST" class="space-y-4">
                @csrf
                @if ($errors->any())
                <div role="alert" class="alert alert-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div>
                    <span class="text-base label-text text-gray-700">Email</span>
                    <label class="label input flex items-center gap-2">
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
                    <input name="email" type="email" placeholder="Email Address" class="w-full" />
                    </label>
                </div>
                <div>
                    <span class="text-base label-text text-gray-700">Password</span>
                    <label class="label input flex items-center gap-2">
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
                        <input name="password" type="password" placeholder="Enter Password" class="w-full" />
                    </label>
                </div>
                <div>
                    <button type="submit" class="btn btn-block bg-transparent text-black hover:text-white">Login</button>
                </div>
                <span class="text-gray-700 flex mt-5">Don't have an account yet?
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-800 hover:underline">Register</a></span>
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