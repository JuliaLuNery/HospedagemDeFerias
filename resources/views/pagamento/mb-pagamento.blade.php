<head>
    {{-- Fonte --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200..800&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <title>Pagamento | Hospedagem de Férias</title>

</head>


@extends('layouts.paginaInterna')

@section('content')
    @csrf
    <div class=" mx-7">
        <h1 class="text-[#1c1c6b] font-semibold font-titulo text-4xl mb-2 text-center">Só falta mais um passo para você
            desfrutar desta experiência!</h1>


        <div class="flex flex-col items-center justify-center">

            <div
                class="flex flex-col rounded-lg bg-white shadow-sm max-w-96 p-8 my-6 border border-slate-200 items-center font-texto text-[#151516] w-1/2">
                <div class="pb-8 m-0 mb-8 text-center text-slate-800 border-b border-slate-200">
                    <p class="text-sm uppercase font-semibold text-slate-500">
                        Multibanco
                    </p>
                    <h1 class="flex justify-center gap-1 mt-5 font-bold text-slate-800 text-9xl">
                        <span class="text-3xl">£ {{ number_format($reserva->preco_total, 2, ',', '.') }}</span>

                    </h1>
                </div>
                <div class="p-0">
                    <ul class="flex flex-col gap-4">
                        <li class="flex items-center gap-4">
                            <p class=" text-lg text-slate-500">
                                Entidade: <span class="font-semibold">12345</span>
                            </p>
                        </li>
                        <li class="flex items-center gap-4">
                            <p class="text-lg text-slate-500">
                                Referência: <span class="font-semibold">789 123 456 </span>
                            </p>
                        </li>
                        <li class="flex items-center gap-4">
                            <p class=" text-lg text-slate-500">
                                Valor: <span class="font-semibold">£
                                    {{ number_format($reserva->preco_total, 2, ',', '.') }}</span>
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="p-0 mt-12">

                    <form method="POST" action="{{ route('pagamento.confirmar', ['reserva_id' => $reserva->id]) }}"
                        id="formPagamento">
                        @csrf
                        <button onclick="confirmarPagamento(event)"
                            class="min-w-32 w-full rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-lg text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="submit">
                            Pagar
                        </button>
                    </form>

                    <script>
                        function confirmarPagamento(event) {
                            event.preventDefault();

                            if (confirm('Deseja confirmar o pagamento?')) {
                                fetch(document.getElementById('formPagamento').action, {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Accept': 'application/json',
                                        'Content-Type': 'application/json',
                                    },
                                }).then(() => {
                                    alert('Pagamento realizado com sucesso!');
                                    window.location.href = "{{ route('reservas.minhas') }}";
                                }).catch(() => {
                                    alert('Erro ao processar pagamento.');
                                });
                            }
                        }
                    </script>

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
