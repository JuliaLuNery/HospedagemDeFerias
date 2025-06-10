<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hospedagem de Férias</title>


    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet"> --}}

    {{-- CSS personalizado --}}
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="app.css"> --}}


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('Imagens/Logo_Icone.png') }}" type="image/png">

    {{-- Fonte --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200..800&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">


    {{-- stylesheet --}}
    <link rel="stylesheet" href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" />

    <!-- script -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/script-name.js"></script>


    {{-- Calendario --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>



</head>

<body class="bg-[#f7f4f4]">
    {{-- Conteúdo padrão -> aparecerá em todas as páginas --}}

    <header>

        {{-- Navbar --}}
        <nav
            class="block w-full max-w-screen-xlg px-4 py-2 mx-auto text-white bg-white shadow-md rounded-md lg:px-8 lg:py-7 mt-0">
            <div class="container flex flex-wrap items-center justify-between mx-auto text-slate-800">
                <img src="Imagens/Logo_Principal.png" alt="Logo Principal" class="h-16 w-auto">
                <a href="site/index" class="mr-4 block cursor-pointer py-1.5 text-base text-slate-800 font-semibold">
                </a>
                <div class="hidden lg:block">
                    <ul class="flex flex-col gap-2 mt-2 mb-4 lg:mb-0 lg:mt-0 lg:flex-row lg:items-center lg:gap-6">
                        <li class="flex items-center p-1 text-sm gap-x-2 text-slate-600">


                            <a href="#" class="flex items-center">
                                Reservas
                            </a>
                        </li>
                        <form method="GET" action="{{ route('login') }}">
                            @csrf
                            <button
                                class="rounded-md bg-[#ff501a] py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-[#ff501a] focus:shadow-none active:bg-hover:bg-[#ff6e41] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2"
                                type="submit">
                                Entrar na sua conta
                            </button>
                        </form>

                        <form method="GET" action="{{ route('register') }}">
                            @csrf
                            <button
                                class="rounded-md bg-[#1c1c6b] py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-[#1c1c6b] focus:shadow-none active:bg-[#29299a] hover:bg-[#1c1c6b] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-1"
                                type="submit">
                                Criar uma conta
                            </button>
                        </form>


                        {{-- <li
          class="flex items-center p-1 text-sm gap-x-2 text-slate-600">


          <a href="#" class="flex items-center">
            Account
          </a>
        </li>
        <li
          class="flex items-center p-1 text-sm gap-x-2 text-slate-600">


          <a href="#" class="flex items-center">
            Blocks
          </a>
        </li>
        <li
          class="flex items-center p-1 text-sm gap-x-2 text-slate-600">


          <a href="#" class="flex items-center">
            Docs
          </a>
        </li> --}}
                    </ul>
                </div>
                <button
                    class="relative ml-auto h-6 max-h-[40px] w-6 max-w-[40px] select-none rounded-lg text-center align-middle text-xs font-medium uppercase text-inherit transition-all hover:bg-transparent focus:bg-transparent active:bg-transparent disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:hidden"
                    type="button">
                    <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </span>
                </button>
            </div>
        </nav>

        <br><br>

    </header>

    <main class="contanier">
        @yield('content')
    </main>


    @vite(['resources/css/app.css', 'resources/js/app.js'])

</body>

</html>
