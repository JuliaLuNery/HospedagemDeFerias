@extends('layouts.pagina')

@section('content')
    <h1 class="titulo">Aqui você encontra outro significado para as suas férias!</h1>
    <br>

    {{-- Galeria de imagens --}}

    <div class="grid grid-cols-3 gap-4 sm:grid-cols-2 md:grid-cols-3 mx-8">
        @foreach ($bem_locavel as $um_bem)
            <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-100">
                <div class="relative h-62 m-2.5 overflow-hidden text-white rounded-md">
                    <img src="{{ asset($um_bem->observacao) }}" alt="Hospedagem 1" />
                </div>
                <div class="p-4">
                    <div class="items-center justify-between mb-2">
                        <h6 class="text-slate-800 text-xl font-semibold text-center">
                            {{ $um_bem->modelo }}
                        </h6>
                        <div class="flex items-center gap-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-5 h-5 text-yellow-600">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-slate-600 ml-1.5">5.0</span>
                        </div>

                        <p class="text-slate-600 leading-normal font-light">
                            Enter a freshly updated and thoughtfully furnished peaceful home surrounded by ancient
                            trees, stone walls, and open meadows.
                        </p>

                        <div class="flex items-center gap-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5 text-black">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.25 7.756a4.5 4.5 0 1 0 0 8.488M7.5 10.5h5.25m-5.25 3h5.25M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span class="text-slate-600 ml-1.5 font-bold">{{ $um_bem->preco_diario }}</span>
                        </div>


                        <div class="px-4 pb-4 pt-0 mt-2">
                            <button
                                class="w-full rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button">
                                Reserve
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

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






    {{--
    <div>
        <img class="object-cover object-center w-full h-40 max-w-full rounded-lg" src="Imagens/hospedagem/casa1.jpg"
            alt="Hospedagem 1" />
    </div>
    <div>
        <img class="object-cover object-center w-full h-40 max-w-full rounded-lg" src="Imagens/hospedagem/casa2.jpg"
            alt="Hospedagem 2" />
    </div>
    <div>
        <img class="object-cover object-center w-full h-40 max-w-full rounded-lg" src="Imagens/hospedagem/casa3.jpg"
            alt="Hospedagem 3" />
    </div>
    <div>
        <img class="object-cover object-center w-full h-40 max-w-full rounded-lg" src="Imagens/hospedagem/casa4.jpg"
            alt="Hospedagem 4" />
    </div>
    <div>
        <img class="object-cover object-center w-full h-40 max-w-full rounded-lg" src="Imagens/hospedagem/casa5.jpg"
            alt="Hospedagem 5" />
    </div>
    <div>
        <img class="object-cover object-center w-full h-40 max-w-full rounded-lg" src="Imagens/hospedagem/casa6.jpg"
            alt="Hospedagem 6" />
    </div>
    <div>
        <img class="object-cover object-center w-full h-40 max-w-full rounded-lg" src="Imagens/hospedagem/casa7.jpg"
            alt="Hospedagem 7" />
    </div>
    <div>
        <img class="object-cover object-center w-full h-40 max-w-full rounded-lg" src="Imagens/hospedagem/casa8.jpg"
            alt="Hospedagem 8" />
    </div>
    <div>
        <img class="object-cover object-center w-full h-40 max-w-full rounded-lg" src="Imagens/hospedagem/casa9.jpg"
            alt="Hospedagem 9" />
    </div>
    <div>
        <img class="object-cover object-center w-full h-40 max-w-full rounded-lg" src="Imagens/hospedagem/casa10.jpg"
            alt="Hospedagem 10" />
    </div>
    <div>
        <img class="object-cover object-center w-full h-40 max-w-full rounded-lg" src="Imagens/hospedagem/casa11.jpg"
            alt="Hospedagem 11" />
    </div>
    <div>
        <img class="object-cover object-center w-full h-40 max-w-full rounded-lg" src="Imagens/hospedagem/casa12.jpg"
            alt="Hospedagem 12" />
    </div>
    <div>
        <img class="object-cover object-center w-full h-40 max-w-full rounded-lg" src="Imagens/hospedagem/casa13.jpg"
            alt="Hospedagem 13" />
    </div>
    <div>
        <img class="object-cover object-center w-full h-40 max-w-full rounded-lg" src="Imagens/hospedagem/casa14.jpg"
            alt="Hospedagem 14" />
    </div>
    <div>
        <img class="object-cover object-center w-full h-40 max-w-full rounded-lg" src="Imagens/hospedagem/casa15.jpg"
            alt="Hospedagem 15" />
    </div>
    <div>
        <img class="object-cover object-center w-full h-40 max-w-full rounded-lg" src="Imagens/hospedagem/casa16.jpg"
            alt="Hospedagem 16" />
    </div>
    </div> --}}
@endsection
