<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Jquery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


        <!-- Sweet Alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            {{-- kasih if else navigasi utk karyawan, ka hrd, ka departemen --}}
            @if (auth()->check() && auth()->user()->isAdmin())
                @include('layouts.admin-navigation')
            @elseif (auth()->check() && auth()->user()->isKadepartemen())
                @include('layouts.kadepartemen-navigation')
            @elseif (auth()->check() && auth()->user()->isKahrd())
                @include('layouts.kahrd-navigation')
            @else
                @include('layouts.navigation')
            @endif

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @if (session()->has('success'))
        <script>
            Swal.fire({
                title:'Berhasil!',
                text: "{{ session('success') }}",
                icon: 'success',
            });
            </script>
        @endif
        @if (session()->has('error'))
        <script>
            Swal.fire({
                title:'Error!',
                text: "{{ session('error') }}",
                icon: 'error',
            });
            </script>
        @endif
    </body>
</html>
