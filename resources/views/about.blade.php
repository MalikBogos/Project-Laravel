<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Sint-Pieters-Leeuw</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
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
          <h2 class="text-4xl font-bold text-gray-800 mb-4">List of sources</h2>

          <h2 class="text-4xl font-bold text-gray-800 mb-4 hover:underline">
            <a href="https://github.com/MalikBogos/Project-Laravel">https://github.com/MalikBogos/Project-Laravel</h2>
          <p class="text-gray-600 mb-8"><a href="https://chatgpt.com/" class="text-blue-500 hover:underline">https://chatgpt.com/</a></p>
<p class="text-gray-600 mb-8"><a href="https://www.phind.com/search?home=true" class="text-blue-500 hover:underline">https://www.phind.com/search?home=true</a></p>
<p class="text-gray-600 mb-8"><a href="https://www.youtube.com/watch?v=HmqIqRYgnO4" class="text-blue-500 hover:underline">https://www.youtube.com/watch?v=HmqIqRYgnO4</a></p>
<p class="text-gray-600 mb-8"><a href="https://www.youtube.com/watch?v=Gr1Mmb1KYA8" class="text-blue-500 hover:underline">https://www.youtube.com/watch?v=Gr1Mmb1KYA8</a></p>
<p class="text-gray-600 mb-8"><a href="https://getavataaars.com/?accessoriesType=Blank&avatarStyle=Circle&clotheColor=Gray02&clotheType=Hoodie&eyeType=Side&eyebrowType=UpDown&facialHairColor=BlondeGolden&facialHairType=MoustacheMagnum&graphicType=Diamond&hairColor=Blonde&hatColor=Blue03&mouthType=Twinkle&skinColor=Yellow&topType=WinterHat2" class="text-blue-500 hover:underline">https://getavataaars.com/?accessoriesType=Blank&avatarStyle=Circle&clotheColor=Gray02&clotheType=Hoodie&eyeType=Side&eyebrowType=UpDown&facialHairColor=BlondeGolden&facialHairType=MoustacheMagnum&graphicType=Diamond&hairColor=Blonde&hatColor=Blue03&mouthType=Twinkle&skinColor=Yellow&topType=WinterHat2</a></p>
<p class="text-gray-600 mb-8"><a href="https://www.youtube.com/watch?v=tZ99AEyHKm4" class="text-blue-500 hover:underline">https://www.youtube.com/watch?v=tZ99AEyHKm4</a></p>
<p class="text-gray-600 mb-8"><a href="https://laravel.com/docs/11.x/starter-kitshttps://laravel.com/docs/11.x/starter-kits" class="text-blue-500 hover:underline">https://laravel.com/docs/11.x/starter-kitshttps://laravel.com/docs/11.x/starter-kits</a></p>
<p class="text-gray-600 mb-8"><a href="https://laravel.com/docs/11.x/middleware" class="text-blue-500 hover:underline">https://laravel.com/docs/11.x/middleware</a></p>
<p class="text-gray-600 mb-8"><a href="https://laravel.com/docs/11.x/csrf" class="text-blue-500 hover:underline">https://laravel.com/docs/11.x/csrf</a></p>
<p class="text-gray-600 mb-8"><a href="https://canvas.ehb.be/courses/33788/modules" class="text-blue-500 hover:underline">https://canvas.ehb.be/courses/33788/modules</a></p>
<p class="text-gray-600 mb-8"><a href="https://github.com/osmanaktrk/team2" class="text-blue-500 hover:underline">https://github.com/osmanaktrk/team2</a></p>
<p class="text-gray-600 mb-8"><a href="https://www.youtube.com/@LaravelDaily" class="text-blue-500 hover:underline">https://www.youtube.com/@LaravelDaily</a></p>

          <p class="text-gray-600 mb-8"></p>
          </section>
    </main>

    <footer class="bg-gray-800 text-white mt-10 p-6 text-center">
        <p>&copy; 2024 Sint-Pieters-Leeuw. All rights reserved.</p>
        <a href="{{ url('/about') }}" class="text-white hover:underline">About</a>
    </footer>

    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
