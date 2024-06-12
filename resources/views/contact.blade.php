<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Sint-Pieters-Leeuw</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
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
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Contact Us</h2>
            <p class="text-gray-600 mb-8">Feel free to reach out to us for any inquiries or feedback.</p>
            @if(session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('contact.submit') }}" method="POST" class="max-w-lg mx-auto">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your Name" class="form-input w-full px-4 py-2 rounded-md border border-gray-500 focus:border-red-500 focus:outline-none" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" placeholder="Your Email" class="form-input w-full px-4 py-2 rounded-md border border-gray-500 focus:border-red-500 focus:outline-none" required>
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-gray-700 font-bold mb-2">Message</label>
                    <textarea id="message" name="message" rows="5" placeholder="Your Message" class="form-textarea w-full px-4 py-2 rounded-md border border-gray-500 focus:border-red-500 focus:outline-none" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition">Send Message</button>
            </form>
        </section>
    </main>

    <footer class="bg-gray-800 text-white mt-10 p-6 text-center">
        <p>&copy; 2024 Sint-Pieters-Leeuw. All rights reserved.</p>
    </footer>

    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
