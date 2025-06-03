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
<link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200..800&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


  {{-- stylesheet --}}
<link
  rel="stylesheet"
  href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css"
/>

<!-- script -->
<script src="https://unpkg.com/@material-tailwind/html@latest/scripts/script-name.js"></script>


{{-- Calendario --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>



</head>
<body>
    {{-- Conteúdo padrão -> aparecerá em todas as páginas --}}

    <header>
        {{-- <nav>
            <a href="/reservas">Reservas</a>
        </nav> --}}


        {{-- Navbar --}}
  <nav class="block w-full max-w-screen-lg px-4 py-2 mx-auto text-white bg-white shadow-md rounded-md lg:px-8 lg:py-3 mt-10">
  <div class="container flex flex-wrap items-center justify-between mx-auto text-slate-800">
    <img src="Imagens/Logo_Principal.png" alt="Logo Principal" class="h-12">
    <a href="#"
      class="mr-4 block cursor-pointer py-1.5 text-base text-slate-800 font-semibold">
    </a>
    <div class="hidden lg:block">
      <ul class="flex flex-col gap-2 mt-2 mb-4 lg:mb-0 lg:mt-0 lg:flex-row lg:items-center lg:gap-6">
        <li
          class="flex items-center p-1 text-sm gap-x-2 text-slate-600">


          <a href="#" class="flex items-center">
            Reservas
          </a>
        </li>
<button class="rounded-md bg-[#ff501a] py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-[#ff501a] focus:shadow-none active:bg-hover:bg-[#ff6e41] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2" type="button">
  Entrar na sua conta
</button>
<button class="rounded-md bg-[#1c1c6b] py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-[#1c1c6b] focus:shadow-none active:bg-[#29299a] hover:bg-[#1c1c6b] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-1" type="button">
  Criar uma conta
</button>

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
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </span>
    </button>
  </div>
</nav>

<br><br>

{{-- Barra de Pesquisa --}}
<div class="flex items-center justify-center">
<div class="w-full max-w-sm min-w-[1000px]">
  <div class="relative flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute w-5 h-5 top-2.5 left-2.5 text-slate-600">
      <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
    </svg>

    <input
    class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md pl-10 pr-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
    placeholder="Localidades"
    />

    <button
      class="rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2"
      type="button"
    >
      Pesquisar
    </button>
    </div>
    <br>


{{-- Calendario --}}
<div class="flex-row" >
  <div class="grid grid-cols-3 gap-4 items-center">

    <!-- Data de Início -->
        {{-- <div>
                    <label for="data_inicio" class="block text-sm font-semibold text-gray-700 mb-1">
                        📅 Data de Chegada
                    </label>
                    <input type="date" id="data_inicio" name="data_inicio" value="{{ request('data_inicio') }}"
                        min="{{ date('Y-m-d') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-dark focus:border-purple-dark shadow-sm"
                        required>
                </div> --}}

    <div class="relative h-10 min-w-[200px]">
      <input
        {{-- id="date-picker-start" --}}
        type="date" id="data_inicio" name="data_inicio" value="{{request ('data_inicio')}}"
        {{-- min="{{date(Y-m-d)}}" --}}
        class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 text-sm text-blue-gray-700 outline-none focus:border-2 focus:border-gray-900 placeholder-shown:border-blue-gray-200"
        placeholder=" "
        required>


      <label for="data_inicio"
        class="absolute left-0 -top-1.5 text-[11px] text-gray-500 transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:top-2.5 pl-3">
        Início da Viagem
      </label>
    </div>

    <!-- Data de Fim -->
    <div class="relative h-10 min-w-[200px]">
      <input
        type="date" id="data_fim" name="data_fim" value="{{request('data_fim')}}"
        class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 text-sm text-blue-gray-700 outline-none focus:border-2 focus:border-gray-900 placeholder-shown:border-blue-gray-200"
        placeholder=" "
        required>

      <label for="data_fim"
      {{-- <label for="date-picker-end" --}}
        class="absolute left-0 -top-1.5 text-[11px] text-gray-500 transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:top-2.5 pl-3">
        Término da Viagem
      </label>
    </div>

    <script>
        const dI = document.getElementById('data_inicio');
        const dF = document.getElementById('data_fim');

        // Atualiza o mínimo de data_fim automaticamente
        dI.addEventListener('change', () => {
            const dataSelecionada = new Date(dI.value);
            dataSelecionada.setDate(dataSelecionada.getDate() + 1)
        });

    </script>

       <!-- Hóspedes -->
    <div class="min-w-[200px]">
      <div class="relative h-10">
        <label for="amountInput"
          class="absolute left-0 -top-1.5 text-[11px] text-gray-500 transition-all pl-3">
          Quantidade de Hóspedes
        </label>
        <input
          id="hospedes"
          type="number"
          value="0"
          class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 pr-20 py-2.5 text-sm text-blue-gray-700 outline-none focus:border-2 focus:border-gray-900 placeholder-shown:border-blue-gray-200"
          placeholder=" "

          {{-- @for ($i = 1; $i <= 10; $i++)

                            <option value="{{ $i }}" {{ request('hospedes') == $i ? 'selected' : '' }}>
                                {{ $i }} {{ $i == 1 ? 'hóspede' : 'hóspedes' }}
                            </option>
                        @endfor --}}

        />
        <button id="decreaseButton"
          class="absolute right-9 top-1.5 rounded bg-slate-800 p-1.5 text-white hover:bg-slate-700"
          type="button">
          -
        </button>
        <button id="increaseButton"
          class="absolute right-1 top-1.5 rounded bg-slate-800 p-1.5 text-white hover:bg-slate-700"
          type="button">
          +
        </button>
      </div>
      <p class="text-xs text-slate-400 mt-1">Use os botões ou digite o número.</p>
    </div>

  </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  flatpickr("#date-picker-start", {});
  flatpickr("#date-picker-end", {});

  const amountInput = document.getElementById('amountInput');
  document.getElementById('increaseButton').addEventListener('click', () => {
    amountInput.value = parseInt(amountInput.value) + 1;
  });
  document.getElementById('decreaseButton').addEventListener('click', () => {
    amountInput.value = Math.max(0, parseInt(amountInput.value) - 1);
  });
</script>


<br><br>

    </header>


    {{-- Conteúdo personalizado de cada página --}}
    <main class="contanier">
        @yield('content')
    </main>


@vite(['resources/css/app.css', 'resources/js/app.js'])

</body>
</html>
