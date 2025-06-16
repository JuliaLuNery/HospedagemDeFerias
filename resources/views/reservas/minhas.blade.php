<head>
    {{-- Fonte --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200..800&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

            {{-- Favicon --}}
    <link rel="icon" href="{{ asset('Imagens/Logo_Icone.png') }}" type="image/png">


    <title>Minhas Reservas | Hospedagem de Férias</title>

</head>
<div class="bg-[#1c1c6b]">

    @extends('layouts.paginaInterna')

    @section('content')
        @csrf

        <div class="bg-[#1c1c6b] py-8 px-10 min-h-screen">
            <h1 class="text-[#ededf2] font-semibold font-titulo text-4xl mb-8">Reservas realizadas</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @forelse ($reservas as $reserva)
                    <div class="flex flex-col bg-white shadow-sm border border-slate-200 rounded-lg p-6 inline-flex justify-center items-center">
                        <div class="flex items-center mb-4">
                            <svg class="w-[50px] h-[50px] fill-[#151516]" viewBox="0 0 576 512"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z" />
                            </svg>
                            <h5 class="ml-3 text-slate-800 text-xl font-semibold">
                                {{ $reserva->bemLocavel->modelo ?? 'Nome do Bem Locável' }}
                            </h5>
                        </div>

                        <p class="text-slate-600 mb-2">
                            <strong> {{ \Carbon\Carbon::parse($reserva->data_inicio)->format('d/m/Y') }} </strong> -
                            <strong> {{ \Carbon\Carbon::parse($reserva->data_fim)->format('d/m/Y') }}</strong>
                        </p>

                        <p class="text-slate-600 mb-2">
                            Local: {{ $reserva->bemLocavel->localizacao->cidade ?? '-' }} |
                            {{ $reserva->bemLocavel->localizacao->filial ?? '-' }}
                        </p>

                        <p class="text-slate-600 mb-2">
                            Status: <span class="font-semibold capitalize">{{ $reserva->status }}</span>
                        </p>
                        <div class="flex gap-2 mt-4 mb-3 w-full inline-flex justify-center items-center">
                            <!-- Botão de download -->
                            <a href="{{ route('reserva.download', $reserva->id) }}"
                                class="inline-flex justify-center items-center rounded-md bg-[#ff501a] py-2 px-4 border border-transparent text-center text-md text-white transition-all shadow-md hover:shadow-lg focus:bg-[#ff501a] focus:shadow-none active:bg-hover:bg-[#ff6e41] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2">
                                Baixar PDF </a>

                            <!-- Botão de e-mail -->
                            <form action="{{ route('reserva.email', $reserva->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="inline-flex justify-center items-center rounded-md bg-[#1c1c6b] py-2 px-4 border border-transparent text-center text-md text-white transition-all shadow-md hover:shadow-lg focus:bg-[#1c1c6b] focus:shadow-none active:bg-[#29299a] hover:bg-[#1c1c6b] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-1">
                                    Enviar por e-mail
                                </button>
                            </form>
                        </div>


                        <div class="mt-auto">
                            <a href="{{ route('reserva.detalhe', $reserva->id) }}"
                                class="text-slate-800 font-semibold text-sm hover:underline flex items-center">
                                Detalhes
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-white">Você ainda não fez nenhuma reserva.</p>
                @endforelse
            </div>
        </div>

        <br>
        {{-- Rodapé --}}
        <footer class="flex flex-col items-center bg-[#151516] text-center text-white">
            <div class="container px-6 pt-6">
                <!-- Social media icons container -->
                <div class="mb-6 flex justify-center space-x-2">
                    <a href="#!" type="button"
                        class="rounded-full bg-[#3b5998] p-3 uppercase leading-normal text-white shadow-dark-3 shadow-black/30 transition duration-150 ease-in-out hover:shadow-dark-1 focus:shadow-dark-1 focus:outline-none focus:ring-0 active:shadow-1 dark:text-white"
                        data-twe-ripple-init data-twe-ripple-color="light">
                        <span class="[&>svg]:h-5 [&>svg]:w-5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 320 512">
                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                                <path
                                    d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                            </svg>
                        </span>
                    </a>

                    <a href="#!" type="button"
                        class="rounded-full bg-[#55acee] p-3 uppercase leading-normal text-white shadow-dark-3 shadow-black/30 transition duration-150 ease-in-out hover:shadow-dark-1 focus:shadow-dark-1 focus:outline-none focus:ring-0 active:shadow-1 dark:text-white"
                        data-twe-ripple-init data-twe-ripple-color="light">
                        <span class="mx-auto [&>svg]:h-5 [&>svg]:w-5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512">
                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                                <path
                                    d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                            </svg>
                        </span>
                    </a>

                    <a href="#!" type="button"
                        class="rounded-full bg-[#ac2bac] p-3 uppercase leading-normal text-white shadow-dark-3 shadow-black/30 transition duration-150 ease-in-out hover:shadow-dark-1 focus:shadow-dark-1 focus:outline-none focus:ring-0 active:shadow-1 dark:text-white"
                        data-twe-ripple-init data-twe-ripple-color="light">
                        <span class="mx-auto [&>svg]:h-5 [&>svg]:w-5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                                <path
                                    d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                            </svg>
                        </span>
                    </a>

                </div>
            </div>

            <!--Copyright section-->
            <div class="w-full bg-black/5 p-4 text-center">
                © 2025 Copyright
            </div>
        </footer>
    </div>
@endsection
