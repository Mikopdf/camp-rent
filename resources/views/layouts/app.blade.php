<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'CampRent')</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- AlpineJS --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    {{-- Tailwind Config --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                    },
                },
            },
        }
    </script>

    {{-- Cloak styling --}}
    <style>
        [x-cloak] { display: none !important; }

        nav {
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        nav.scrolled {
            background-color: #ffffffcc;
            backdrop-filter: saturate(180%) blur(20px);
            box-shadow: 0 2px 12px rgb(0 0 0 / 0.1);
        }
    </style>
</head>
<body class="font-sans bg-gray-50 text-gray-800 min-h-screen flex flex-col scroll-smooth">

    {{-- Navbar --}}
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 bg-transparent py-5 px-8 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-bold text-primary-600 hover:text-primary-700 transition">CampRent</a>
        <div>
            @auth
                <a href="{{ route('dashboard') }}" class="text-sm text-gray-700 hover:text-primary-600 mr-6 transition">Dashboard</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-sm text-red-600 hover:text-red-700 transition">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-primary-600 mr-6 transition">Login</a>
                <a href="{{ route('register') }}" class="text-sm text-gray-700 hover:text-primary-600 transition">Daftar</a>
            @endauth
        </div>
    </nav>

    {{-- Main Content with Animation --}}
    <main class="flex-grow pt-24">
        <div
            x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 100)"
            x-cloak
            x-show="show"
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
        >
            @yield('content')
        </div>
    </main>

    {{-- Footer --}}
    <footer class="bg-white mt-12 py-6 text-center text-sm text-gray-500 border-t select-none">
        &copy; {{ date('Y') }} CampRent. All Rights Reserved.
    </footer>

    {{-- Navbar scroll script --}}
    <script>
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
