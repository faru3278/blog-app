<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Laravel App' }}</title>
    @vite('resources/css/app.css') {{-- Tailwind setup --}}
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Header -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-indigo-600">My App</h1>
            <nav>
                <a href="/" class="px-3 text-gray-700 hover:text-indigo-600">Home</a>
                <a href="/register" class="px-3 text-gray-700 hover:text-indigo-600">Register</a>
                <a href="/login" class="px-3 text-gray-700 hover:text-indigo-600">Login</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-4 py-8">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow mt-12">
        <div class="max-w-7xl mx-auto px-4 py-4 text-center text-gray-600">
            &copy; {{ date('Y') }} My App. All rights reserved.
        </div>
    </footer>
</body>
</html>
