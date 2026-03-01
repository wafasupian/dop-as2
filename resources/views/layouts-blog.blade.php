<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Homepage</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<header class="bg-white shadow-md p-4 flex justify-between items-center container mx-auto mt-6 rounded-lg">
    <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-800">Cartoon</a>
    <nav class="flex items-center space-x-6">

    <a href="{{ route('about') }}" class="text-gray-700 hover:text-black font-medium">
        About
    </a>

    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-black font-medium">
        Contact
    </a>

    @auth
        <!-- If user is logged in -->
        <a href="{{ route('dashboard') }}"
           class="px-4 py-2 bg-gray-900 text-white rounded-lg text-sm font-semibold hover:bg-black transition">
            Dashboard
        </a>
    @else
        <!-- If user is NOT logged in -->
        <a href="{{ route('login') }}"
           class="px-4 py-2 border border-gray-900 text-gray-900 rounded-lg text-sm font-semibold hover:bg-gray-900 hover:text-white transition">
            Login
        </a>

        <a href="{{ route('register') }}"
           class="px-4 py-2 bg-gray-900 text-white rounded-lg text-sm font-semibold hover:bg-black transition">
            Sign Up
        </a>
    @endauth

</nav>
</header>
 
@yield('content')
 
</body>
</html>