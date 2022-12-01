<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        

          <script src="https://cdn.tailwindcss.com"></script>
       

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-image: url('/images/blog-bg.jpg');
                background-repeat: no-repeat;
                background-size: cover;
                
                
                
            }
        </style>
    </head>
    <body class="antialiased">
        <div class=" justify-center  sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block ">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-white dark:text-white bg-violet-500 rounded p-3">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-white dark:text-white  bg-blue-600 rounded p-3">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-white bg-lime-500 rounded p-3">Register</a>
                        @endif
                    @endauth
                </div>
            @endif  
        </div>
        <div class="absolute   justify-center  top-96   left-0 right-0  text-center  ">
            <h3 class="font-bold text-6xl text-white">Laravel Blog </h3>

            <div class="mt-10">

                <a href="/blog/" class="bg-stone-900 text-white p-3 rounded-2xl hover:bg-indigo-500">
                    Visit Blog
                </a>
            </div>

        </div>
    </body>
</html>
