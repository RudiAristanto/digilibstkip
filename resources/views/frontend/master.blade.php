<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons" />
    <title>@yield('title', 'Homepage') - Digilib STKIPPO</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100">
    <!-- navbar -->
     <nav class="bg-green-800 text-white py-4 relative z-50">
        <div class="container max-w-6xl mx-auto flex justify-between items-center">
        <a href="{{route('homepage')}}"><img src="/images/header.png" alt="Logo" class="w-50 h-15"></a>
        <!-- <a href="{{route('homepage')}}" class="text-2xl font-bold">Digilib STKIPPO</a> -->
            <div>
                <!-- <a href="{{route('homepage')}}" class="px-4 hover:font-bold hover:text-yellow-500 transition duration-200">Homepage</a>
                <a href="{{route('login')}}" class="px-4 hover:font-bold hover:text-yellow-500 transition duration-200">Login</a> -->

                <a href="{{ route('homepage') }}" class="px-4 hover:font-bold hover:text-yellow-500 transition duration-200">Homepage</a>

                @guest
                    <a href="{{ route('login') }}" class="px-4 hover:font-bold hover:text-yellow-500 transition duration-200">Login</a>
                @endguest

                @auth
                <div class="relative inline-block text-left" x-data="{ open: false }">
                    <button @click="open = !open" class="px-4 hover:font-bold hover:text-yellow-500 transition duration-200 focus:outline-none">
                        Hai, {{ Auth::user()->name }}
                        <span class="material-icons align-middle">expand_more</span>
                    </button>

                    <!-- Dropdown -->
                    <div x-show="open" x-cloak @click.away="open = false"
                        class="absolute right-0 mt-2 w-48 bg-white text-black rounded shadow-lg z-50">
                        <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}"
                        class="block px-4 py-2 hover:bg-gray-200">
                        Panel Saya
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-200">Logout</button>
                        </form>
                    </div>
                </div>
                @endauth
            </div>
        </div>
     </nav>

    @yield('content')

     <footer class="text-center bg-green-800 py-5 text-white">
        <p>Copyright &copy; 2025 UPT Perpustakaan STKIP PGRI Ponorogo</p>
      </footer>
</body>
</html>