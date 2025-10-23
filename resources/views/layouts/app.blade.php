<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Stock App')</title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Navigation -->
    <header class="bg-blue-600 text-white p-4 shadow-md">
        <nav class="container mx-auto flex justify-between">
            <div class="font-bold text-lg">Stock App</div>
            <div class="space-x-4">
                <a href="{{ url('/') }}" class="hover:underline">Home</a>
                <a href="{{ url('/upload') }}" class="hover:underline">Upload</a>
                <a href="{{ url('/top-performers') }}" class="hover:underline">Top Performers</a>
                <a href="{{ url('/dashboard') }}" class="hover:underline">Dashboard</a>
            </div>
        </nav>
    </header>

    <!-- Content -->
    <main class="flex-1 container mx-auto p-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-4 mt-auto">
        2025 Stock App
    </footer>

</body>
</html>
