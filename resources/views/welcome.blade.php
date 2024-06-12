<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Sint-Pieters-Leeuw</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow-md">
        <div class="container mx-auto p-6 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.svg') }}" alt="City Blog Logo" class="h-10">
                </a>
                <a href="{{ url('/faq') }}" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition">FAQ</a>
                <a href="{{ url('/contact') }}" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition">Contact</a>
            </div>
            @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                        <a href="{{ url('/profile') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">Profile</a>
                    @else
                        <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">Register</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>
    
    <main class="container mx-auto mt-10 p-6 bg-white rounded-md shadow-md">
        <section class="text-center">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Welcome to Sint-Pieters-Leeuw</h2>
            <p class="text-gray-600 mb-8">Your go-to place for the latest news, events, and stories from around the city.</p>
            <a href="/posts" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition">Explore Latest Posts</a>
        </section>
        
        <section id="latest-posts" class="mt-10">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Latest Posts</h3>
            <!-- Add blog post previews here -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <article class="bg-gray-100 p-4 rounded-md shadow-md">
                    <h4 class="text-xl font-bold text-gray-800">Post Title 1</h4>
                    <p class="text-gray-600 mt-2">Brief description of the blog post...</p>
                    <a href="#" class="text-red-500 hover:underline">Read more</a>
                </article>
                <article class="bg-gray-100 p-4 rounded-md shadow-md">
                    <h4 class="text-xl font-bold text-gray-800">Post Title 2</h4>
                    <p class="text-gray-600 mt-2">Brief description of the blog post...</p>
                    <a href="#" class="text-red-500 hover:underline">Read more</a>
                </article>
                <article class="bg-gray-100 p-4 rounded-md shadow-md">
                    <h4 class="text-xl font-bold text-gray-800">Post Title 3</h4>
                    <p class="text-gray-600 mt-2">Brief description of the blog post...</p>
                    <a href="#" class="text-red-500 hover:underline">Read more</a>
                </article>
                <!-- Add more blog post previews as needed -->
            </div>
        </section>
    </main>

    <footer class="bg-gray-800 text-white mt-10 p-6 text-center">
        <p>&copy; 2024 Sint-Pieters-Leeuw. All rights reserved.</p>
    </footer>

    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
