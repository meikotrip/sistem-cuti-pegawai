<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SI Cuti Pegawai - SRIPO</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:content-between sm:items-center sm:flex-col min-h-screen bg-center bg-gray-300 dark:bg-gray-300 selection:bg-red-500 selection:text-white">
            <div class="sm:flex sm:justify-between navbar w-full bg-white ">
                <div class="sm:flex items-center logo-perusahaan mx-5">
                    <img class="w-32" src="{{ asset('assets/Sriwijaya_Post.webp') }}" alt="logo sriwijaya post" srcset="">
                </div>
                @if (Route::has('login'))
                <div class="sm:flex sm:content-between p-6">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-black focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-black hover:text-gray-900 dark:text-gray-400 dark:hover:text-black focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-black hover:text-gray-900 dark:text-gray-400 dark:hover:text-black focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>

            <section class="bg-gray-50 m-12 w-auto">
                <div class="p-8 md:p-12 lg:px-16 lg:py-24">
                    <img class=" w-72 m-auto mb-10" src="{{ asset('assets/Sriwijaya_Post.webp') }}" alt="logo sriwijaya post" srcset="">
                    <div class="mx-auto max-w-lg text-center">
                        <h2 class="text-2xl font-bold text-gray-900 md:text-3xl">
                         Selamat Datang di Sistem Informasi Cuti Pegawai Sriwijaya Post
                        </h2>
                
                        <p class="hidden text-gray-500 sm:mt-4 sm:block">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae dolor officia blanditiis
                        repellat in, vero, aperiam porro ipsum laboriosam consequuntur exercitationem incidunt
                        tempora nisi?
                        </p>
                    </div>

                    @if (Route::has('login'))
                    <div class="login-register mt-5 text-center">
                            @auth
                                <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-black focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                            @else
                                <a class="group mx-4 relative inline-block text-sm font-medium text-gray-600 focus:outline-none focus:ring active:text-gray-500" href="{{ route('login') }}">
                                    <span class="absolute inset-0 translate-x-0.5 translate-y-0.5 bg-gray-600 transition-transform group-hover:translate-x-0 group-hover:translate-y-0"></span>
                                    <span class="relative block border border-current bg-white px-8 py-3"> Log In </span>
                                </a>        
                                @if (Route::has('register'))
                                <a class="group mx-4 relative inline-block text-sm font-medium text-gray-100 focus:outline-none focus:ring active:text-indigo-500" href="{{ route('register') }}">
                                    <span class="absolute inset-0 translate-x-0 translate-y-0 bg-gray-600 transition-transform group-hover:translate-x-0.5 group-hover:translate-y-0.5"></span>
                                    <span class="relative block border border-current bg-gray-600 px-8 py-3"> Daftar </span>
                                </a>
                                @endif
                            @endauth
                    </div>
                    @endif
                </div>
            </section>

            {{-- <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="mt-16">
                    <div class="grid grid-cols-1 gap-6 lg:gap-8">
                        <div class=" scale-100 p-6 bg-dark dark:bg-red-300/90 dark:bg-gradient-to-bl from-red-500/90 via-transparent dark:ring-1 dark:ring-inset dark:ring-red-600/30 rounded-lg shadow-2xl shadow-gray-600/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div>
                                    <img src="{{ asset('assets/Sriwijaya_Post.webp') }}" alt="logo sriwijaya post" srcset="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </body>
</html>
