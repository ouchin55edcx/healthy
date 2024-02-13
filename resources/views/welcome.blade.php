<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="font-mono">
        <!-- header -->
        <div class="bg-blue-500 p-4 flex justify-between items-center">
            <!--   left side -->
            <div class="flex items-center">
                <img src="storage/images/téléchargement-removebg-preview.png" width="50" alt="LOGO" class="mr-2">
                {{-- <a href="#" class="inline-block p-2 text-blue-200 mr-2 hover:text-blue-100">Home</a>
            <a href="#" class="inline-block p-2 text-blue-200 hover:text-blue-100">About</a> --}}
            </div>
            <!--   right side -->
            <header class="hidden md:block">
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                        @else
                            <a href="{{ route('login') }}"
                                class="inline-block p-2 text-blue-200 mr-2 hover:text-blue-100">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 inline-block p-2 text-blue-200 mr-2 hover:text-blue-100">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </header>

        </div>
        <!-- hero -->

        <div class="md:flex justify-between p-10 bg-blue-100 text-blue-800">

            <!--   right -->
            <div class="md:w-1/2 mb-10 md:mb-0">
                <h2 class="text-5xl font-bold mb-8">Quality Healthcare for You</h2>
                <p class="mb-10">Compassionate care for every patient, every day.</p>
                <a href="#"
                    class="inline-block py-3 px-6 md:text-lg bg-pink-200 hover:text-red-100 hover:bg-pink-800 rounded mr-2">Read
                    more</a><a href="#"
                    class="inline-block py-3 px-6 md:text-lg bg-pink-200 hover:text-red-100 hover:bg-pink-800 rounded mr-2">Contact
                    Us</a>
            </div>

            <!--   left -->
            <div class="md:w-1/2"><img src="storage/images/pexels-louis-bauer-249348.jpg" alt="Hospital"
                    class="w-full rounded shadow-2xl h-auto max-h-full sm:max-h-screen md:max-h-full lg:max-h-screen xl:max-h-full">
            </div>
        </div>
        <!-- services -->
        <div class="flex py-16 px-10 bg-blue-500 text-blue-200 text-center">
            <div class="mr-3 mb-4 text-center">
                <img src="storage/images/pexels-mart-production-7089019.jpg" alt="Service image"
                    class="w-full rounded border-solid border-2 border-blue-200">
                <p>Emergency Care</p>
            </div>
            <div class="mr-3 mb-4 text-center">
                <img src="storage/images/pexels-mart-production-7089019.jpg" alt="Service image"
                    class="w-full rounded border-solid border-2 border-blue-200">
                <p>Specialized Treatments</p>
            </div>
            <div class="mr-3 mb-4 text-center">
                <img src="storage/images/pexels-mart-production-7089019.jpg" alt="Service image"
                    class="w-full rounded border-solid border-2 border-blue-200">
                <p>Wellness Programs</p>
            </div>
            <div class="mr-3 mb-4 text-center">
                <img src="storage/images/pexels-mart-production-7089019.jpg" alt="Service image"
                    class="w-full rounded border-solid border-2 border-blue-200">
                <p>Advanced Technology</p>
            </div>
        </div>

        <!-- contact+newsletter -->
        <div class="p-10 bg-blue-900  text-blue-400 flex justify-between">
            <div class="md:w-1/2">
                <h3 class="text-lg mb-2">Stay Informed with Our Newsletter!</h3>
                <form action="" class="flex">
                    <input type="email" class="rounded w-full mr-2 py-3 px-4 outline-none focus:bg-blue-100">
                    <button class="bg-red-400 rounded px-4 hover:bg-red-600">Subscribe</button>
                </form>
            </div>
            <div class="flex items-center">© HealthHub 2024. All rights reserved.</div>
        </div>
    </div>
</body>

</html>
