<head>
    {{-- Fonte --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200..800&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <title>Reserva | Hospedagem de Férias</title>

</head>


@extends('layouts.paginaInterna')

@section('content')
    @csrf

    <div class="bg-[#f7f4f4] mx-16">

        {{-- Informações da reserva --}}

        <h1 class="text-[#1c1c6b] font-semibold font-titulo text-4xl mb-1">A sua reserva</h1>
        <h2 class="mt-1 mb-7 text-lg font-medium leading-tight text-[#808083] ">
            Você já está a meio caminho de poder aproveitar esta experiência incrível!
        </h2>

        <div class="flex flex-col lg:flex-row justify-between gap-6 w-full font-texto text-[#151516]">

            {{-- Informações do produto --}}
            <div
                class="border rounded-lg shadow-sm bg-white pt-6 pb-2 shadow-secondary-1 inline-flex flex-col px-8 w-full">

                <h2 class="mb-1 mt-5 text-xl font-semibold">
                    Confirme os seguintes dados:
                </h2>

                <ul class="w-96 text-surface dark:text-white ml-5">

                    <li class="w-full border-b-2 border-neutral-100 py-4 dark:border-white/10">
                        <strong>Residência:</strong> {{ $dados['modelo'] }}
                    </li>
                    <li class="w-full border-b-2 border-neutral-100 py-4 dark:border-white/10">
                        <strong>Local:</strong> {{ $dados['cidade'] }} |
                        {{ $dados['filial'] }}
                    </li>
                    <li class="w-full border-b-2 border-neutral-100 py-4 dark:border-white/10">
                        <strong>Quantidade de Hóspedes:</strong> {{ $dados['hospedes'] }}
                    </li>
                    <li class="w-full border-b-2 border-neutral-100 py-4 dark:border-white/10">
                        <strong>Estadia de:</strong> {{ $dados['dias'] }} dias
                         {{-- <strong>Estadia de:</strong> {{ $dados['dias'] }} {{ $dados['dias'] > 1 ? 'dias' : 'dias' }} --}}
                    </li>
                    <li class="w-full border-b-2 border-neutral-100 py-4 dark:border-white/10">
                        <strong>Período:</strong> {{ $dados['data_inicio'] }} a {{ $dados['data_fim'] }}
                    </li>

                </ul>

                <button type="button"
                    class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                    data-twe-ripple-init data-twe-ripple-color="light">
                    Button
                </button>
            </div>
            {{-- //mostrar os dados do produto
            $dados = ([ $data_inicio, $data_fim, $imagem, $modelo, $cidade, $filial, $quartos, $hospedes, $banheiros,
            $camas,
            $preco_total]);

            //mostrar a ref multibanco entidade
            //botao pagar
            /chama a rota que grava na BD e redireciona para home/dashbord --}}



            {{-- Informações do preço --}}
            <div
                class="h-min w-full border rounded-lg shadow-sm bg-white p-6 shadow-secondary-1 inline-flex flex-col ">
                <div class="p-4">
                    <p
                        class="block antialiased font-sans text-lg font-light leading-relaxed text-blue-gray-900 !font-semibold">
                        Valor
                    </p>
                    <div class="my-4 space-y-2">
                        <div class="flex items-center justify-between">
                            <p
                                class="block antialiased font-sans text-base font-light leading-relaxed text-inherit text-gray-600 font-normal">
                                Preço diário
                            </p>
                            <p
                                class="block antialiased font-sans text-base font-light leading-relaxed text-inherit text-gray-600 font-normal">
                                £ {{ number_format($dados['preco_diario'], 2, ',', '.') }}
                            </p>
                        </div>
                    </div>
                    <div class="my-4 space-y-2">
                        <div class="flex items-center justify-between">
                            <p
                                class="block antialiased font-sans text-base font-light leading-relaxed text-inherit text-gray-600 font-normal">
                                Preço Total
                            </p>
                            <p
                                class="block antialiased font-sans text-base font-light leading-relaxed text-inherit text-gray-600 font-normal">
                                £ {{ number_format($dados['preco_total'], 2, ',', '.') }}
                            </p>
                        </div>
                    </div>
                    <div class="my-4 space-y-2">
                        <div class="flex items-center justify-between">
                            <p
                                class="block antialiased font-sans text-base font-light leading-relaxed text-inherit text-gray-600 font-normal">
                                Taxa fixa
                            </p>
                            <p
                                class="block antialiased font-sans text-base font-light leading-relaxed text-inherit text-gray-600 font-normal">
                                £ 10
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between border-t border-gray-300 pt-4">
                        <p
                            class="block antialiased font-sans text-base font-light leading-relaxed text-blue-gray-900 !font-semibold">
                            Preço Total com Taxa
                        </p>
                        <p
                            class="block antialiased font-sans text-base font-light leading-relaxed text-blue-gray-900 !font-semibold">
                            £ {{ number_format($dados['preco_com_taxa'], 2, ',', '.') }}
                        </p>
                    </div>
                </div>

            </div>


            {{-- Informações de pagamento --}}

            <div>
                <form method="POST" action="{{ route('reserva.store') }}">
                    @csrf
                    <!-- Campos ocultos -->
                    <input type="hidden" name="bem_locavel_id" value="{{ $dados['bem_locavel_id'] }}">

                    <div
                        class="border rounded-lg shadow-sm bg-white p-6 shadow-secondary-1 inline-flex flex-col px-6 w-96">
                        @foreach ($dados as $k => $v)
                            <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                        @endforeach

                        <h2 class="mb-3 mt-5 text-xl font-medium">Escolha a forma de pagamento:</h2>

                        <ul class="w-96 text-surface dark:text-white ml-5">

                            <li class="mb-2"><input type="radio" name="forma_pagamento" value="multibanco" required>
                                Multibanco</li>
                            <li class="mb-2"><input type="radio" name="forma_pagamento" value="cartao"> Cartão</li>
                            <li class="mb-2"><input type="radio" name="forma_pagamento" value="paypal"> PayPal</li>

                             </ul>
                            <div class="flex items-center justify-center">
                            <button
                                class="w-60 mt-2 mb-2 rounded-md bg-slate-800 py-2 px-4 text-sm text-white font-normal hover:bg-slate-700 transition-all"
                                type="submit">Prosseguir</button>
                                </div>
                </form>

            </div>


        </div>
    </div>
</div>
    <br><br>



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
@endsection
