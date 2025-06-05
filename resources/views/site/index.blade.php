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
