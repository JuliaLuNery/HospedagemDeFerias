   <head>
       {{-- Fonte --}}

       <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       <link
           href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200..800&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
           rel="stylesheet">

       {{-- Alpine.js --}}
       <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


   </head>

   @extends('layouts.pagina')

   @section('content')
       <h1 class="titulo bg-[#ff501a] py-8">Aqui você encontra outro significado para as suas férias!</h1>
       <br>

       {{-- Cards --}}

       <div x-data="{ modalAtivo: false, dados: {} }">

           <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mx-8 my-10">

               @foreach ($bem_locavel as $dado)
                   <div
                       class="bg-white rounded-lg shadow-sm border border-slate-200 overflow-hidden font-['Work Sans'] text-[#151516] ">
                       <img src="{{ $dado->observacao }}" alt="Imagem" id="imagem" class="w-full h-64 object-cover">

                       <div class="p-4 mx-2">
                           <div class="flex justify-between items-center mb-2">
                               <h2 class="text-xl font-semibold text-center mb-2 font-texto">{{ $dado->modelo }}</h2>

                               {{-- Avaliação --}}
                               <div class="flex items-center gap-1 mb-2 font-semibold">
                                   <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                       class="w-5 h-5 text-yellow-500">
                                       <path
                                           d="M12 .587l3.668 7.568L24 9.748l-6 5.796 1.412 8.242L12 18.897l-7.412 4.889L6 15.544 0 9.748l8.332-1.593z" />
                                   </svg>
                                   <span>{{ $dado->avaliacao }}</span>
                               </div>
                           </div>



                           @php
                               $cidade = $dado->localizacao->cidade ?? 'Cidade não disponível';
                               $filial = $dado->localizacao->filial ?? 'Filial não disponível';
                           @endphp

                           <p class="text-slate-600 mb-1 font-semibold">
                               Local: {{ $cidade }} | {{ $filial }}
                           </p>
                           {{-- Descrição --}}
                           <p class="text-slate-600 text-sm mb-3 font-medium">
                               {{ $dado->marca->observacao }}
                           </p>

                           {{-- Preço --}}
                           <div class="flex items-center gap-0.5 mb-3 justify-end mr-4">
                               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                   stroke="currentColor" class="w-5 h-5 text-black">
                                   <path stroke-linecap="round" stroke-linejoin="round"
                                       d="M14.25 7.756a4.5 4.5 0 1 0 0 8.488M7.5 10.5h5.25m-5.25 3h5.25M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                               </svg>
                               <span
                                   class="text-xl ml-1.5 font-bold font-['Work Sans'] text-[#151516]">{{ $dado->preco_diario }}</span>
                           </div>


                           <!-- BOTÃO QUE ATIVA O MODAL COM DADOS -->
                           <button
                               @click="modalAtivo = true; dados = {
                            id: '{{ $dado->id }}',
                            imagem: '{{ $dado->observacao }}',
                            modelo: '{{ $dado->modelo }}',
                            cidade: '{{ $dado->localizacao->cidade ?? 'Cidade não informada' }}',
                            filial: '{{ $dado->localizacao->filial ?? 'Filial não informada' }}',
                            quartos: '{{ $dado->numero_quartos }}',
                            hospedes: '{{ $dado->numero_hospedes }}',
                            banheiros: '{{ $dado->numero_casas_banho }}',
                            camas: '{{ $dado->numero_camas }}'
                        }"
                               class="w-full mt-2 rounded-md bg-slate-800 py-2 px-4 text-sm text-white font-normal hover:bg-slate-700 transition-all">
                               Reserve
                           </button>
                       </div>
                   </div>
               @endforeach
           </div>


           <!-- MODAL -->
           <form method="GET" action="{{ route('reserva.create') }}">
               @csrf

               <div x-show="modalAtivo" x-transition @click.away="modalAtivo = false"
                   class="fixed inset-0 z-50 flex items-center justify-center bg-[#ededf2] bg-opacity-50 backdrop-blur-sm font-['Work Sans'] text-[#151516]">
                   <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 max-w-lg font-['Work Sans'] text-[#151516] ">
                       <img :src="dados.imagem" alt="Imagem" class="w-full h-60 object-cover rounded mb-4">
                       <input type="hidden" id="modelo" name="modelo" :value="dados.modelo">
                       <h2 class="text-xl font-semibold text-center mb-3" x-text="dados.modelo"></h2>
                       <input type="hidden" id="preco_diario" name="preco_diario" :value="dados.preco_diario">


                       <div class="text-sm space-y-1">
                           <!-- CIDADE -->
                           <div class="flex items-center gap-2">
                               <input type="hidden" name="cidade" id="cidade" :value="dados.cidade">
                               <span><strong>Cidade:</strong> <span x-text="dados.cidade"></span></span>
                           </div>

                           <!-- FILIAL -->
                           <div class="flex items-center gap-2">
                               <input type="hidden" name="filial" id="filial":value="dados.filial">
                               <span><strong>Filial:</strong> <span x-text="dados.filial"></span></span>
                           </div>

                           <div class="flex justify-between items-center mb-2">
                               <!-- QUARTOS -->
                               <div class="flex items-center gap-2">
                                   <svg class="w-[20px] h-[20px] fill-[#151516]" viewBox="0 0 576 512"
                                       xmlns="http://www.w3.org/2000/svg">

                                       <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                       <path
                                           d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c.2 35.5-28.5 64.3-64 64.3H128.1c-35.3 0-64-28.7-64-64V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L416 100.7V64c0-17.7 14.3-32 32-32h32c17.7 0 32 14.3 32 32V185l52.8 46.4c8 7 12 15 11 24zM248 192c-13.3 0-24 10.7-24 24v80c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V216c0-13.3-10.7-24-24-24H248z">
                                       </path>

                                   </svg>
                                   <input type="hidden" name="quartos" id="quartos" :value="dados.quartos">
                                   <span><strong>Quartos:</strong> <span x-text="dados.quartos"></span></span>
                               </div>

                               <!-- HÓSPEDES -->
                               <div class="flex items-center gap-2">
                                   <svg class="w-[20px] h-[20px] fill-[#151516]" viewBox="0 0 576 512"
                                       xmlns="http://www.w3.org/2000/svg">

                                       <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                       <path
                                           d="M543.8 287.6c17 0 32-14 32-32.1c1-9-3-17-11-24L512 185V64c0-17.7-14.3-32-32-32H448c-17.7 0-32 14.3-32 32v36.7L309.5 7c-6-5-14-7-21-7s-15 1-22 8L10 231.5c-7 7-10 15-10 24c0 18 14 32.1 32 32.1h32V448c0 35.3 28.7 64 64 64H448.5c35.5 0 64.2-28.8 64-64.3l-.7-160.2h32zM288 160a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM176 400c0-44.2 35.8-80 80-80h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H192c-8.8 0-16-7.2-16-16z">
                                       </path>

                                   </svg>
                                   <input type="hidden" name="hospedes" id="hospedes" :value="dados.hospedes">
                                   <span><strong>Hóspedes:</strong> <span x-text="dados.hospedes"></span></span>
                               </div>

                               <!-- BANHEIROS -->
                               <div class="flex items-center gap-2">
                                   <svg class="w-[20px] h-[20px] fill-[#151516]" viewBox="0 0 512 512"
                                       xmlns="http://www.w3.org/2000/svg">

                                       <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                       <path
                                           d="M96 77.3c0-7.3 5.9-13.3 13.3-13.3c3.5 0 6.9 1.4 9.4 3.9l14.9 14.9C130 91.8 128 101.7 128 112c0 19.9 7.2 38 19.2 52c-5.3 9.2-4 21.1 3.8 29c9.4 9.4 24.6 9.4 33.9 0L289 89c9.4-9.4 9.4-24.6 0-33.9c-7.9-7.9-19.8-9.1-29-3.8C246 39.2 227.9 32 208 32c-10.3 0-20.2 2-29.2 5.5L163.9 22.6C149.4 8.1 129.7 0 109.3 0C66.6 0 32 34.6 32 77.3V256c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H96V77.3zM32 352v16c0 28.4 12.4 54 32 71.6V480c0 17.7 14.3 32 32 32s32-14.3 32-32V464H384v16c0 17.7 14.3 32 32 32s32-14.3 32-32V439.6c19.6-17.6 32-43.1 32-71.6V352H32z">
                                       </path>

                                   </svg>
                                   <input type="hidden" name="banheiros" id="banheiros" :value="dados.banheiros">
                                   <span><strong>Banheiros:</strong> <span x-text="dados.banheiros"></span></span>
                               </div>

                               <!-- CAMAS -->
                               <div class="flex items-center gap-2">
                                   <svg class="w-[20px] h-[20px] fill-[#151516]" viewBox="0 0 640 512"
                                       xmlns="http://www.w3.org/2000/svg">

                                       <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                       <path
                                           d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z">
                                       </path>

                                   </svg>
                                   <input type="hidden" name="camas" id="camas" :value="dados.camas">
                                   <span><strong>Camas:</strong> <span x-text="dados.camas"></span></span>
                               </div>
                           </div>

                           <br>
                           <div class="flex justify-center gap-3 mt-8">

                               <a href="{{ route('reserva.create', [
                                   'bem_locavel_id' => $dado->id,
                                   'modelo' => $dado->modelo,
                                   'imagem' => $dado->observacao,
                                   'cidade' => $dado->localizacao->cidade ?? 'Não informada',
                                   'filial' => $dado->localizacao->filial ?? 'Não informada',
                                   'quartos' => $dado->numero_quartos,
                                   'banheiros' => $dado->numero_casas_banho,
                                   'camas' => $dado->numero_camas,
                                   'preco_diario' => $dado->preco_diario,
                                   'data_inicio' => request('data_inicio'),
                                   'data_fim' => request('data_fim'),
                                   'hospedes' => request('hospedes'),
                               ]) }}"
                                   class="bg-[#1c1c6b] hover:bg-[#161656] text-white px-4 py-2 rounded">
                                   Reservar
                               </a>




                               {{-- <button type="button" @click="modalAtivo = false"
                                   class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded">
                                   Cancelar
                               </button>

                               <input type="hidden" name="data_inicio" :value="dados.data_inicio">
                               <input type="hidden" name="data_fim" :value="dados.data_fim">
                               <input type="hidden" name="imagem" :value="dados.imagem">
                               <input type="hidden" name="modelo" :value="dados.modelo">
                               <input type="hidden" name="cidade" :value="dados.cidade">
                               <input type="hidden" name="filial" :value="dados.filial">
                               <input type="hidden" name="quartos" :value="dados.quartos">
                               <input type="hidden" name="hospedes" :value="dados.hospedes">
                               <input type="hidden" name="banheiros" :value="dados.banheiros">
                               <input type="hidden" name="camas" :value="dados.camas">
                               <input type="hidden" name="preco_diario" :value="dados.preco_diario">

                               <button type="submit" name="btnReservar" id="btnReservar"
                                   class="bg-[#1c1c6b] hover:bg-[#161656] text-white px-4 py-2 rounded">
                                   Reservar
                               </button> --}}

                               {{-- <button type="submit" onclick="verDetalhes()" name="btnReservar" id="btnReservar"
                                   class="bg-[#1c1c6b] hover:bg-[#161656] text-white px-4 py-2 rounded">
                                   Reservar
                               </button> --}}

                           </div>
                       </div>
                   </div>
               </div>
           </form>

       </div>


       {{-- <script>
           function verDetalhes() {
               const formData = new FormData();
               formData.append('modelo', document.querySelector('input[name="modelo"]').value);
               formData.append('cidade', document.querySelector('input[name="cidade"]').value);
               formData.append('filial', document.querySelector('input[name="filial"]').value);
               formData.append('quartos', document.querySelector('input[name="quartos"]').value);
               formData.append('banheiros', document.querySelector('input[name="banheiros"]').value);
               formData.append('hospedes', document.querySelector('input[name="hospedes"]').value);
               formData.append('camas', document.querySelector('input[name="camas"]').value);
               formData.append('data_inicio', document.querySelector('input[name="data_inicio"]').value);
               formData.append('preco_diario', document.querySelector('input[name="preco_diario"]').value);

               formData.append('data_fim', document.querySelector('input[name="data_fim"]').value);

               formData.append('imagem', document.querySelector('img').src);


               fetch('/reserva/create', {
                   method: 'GET',
                   body: formData,
                   headers: {
                       'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                   }
               }).then(response => {
                   if (response.ok) {
                       window.location.href = '/reserva/sucesso'; // Redireciona após o envio bem-sucedido
                   } else {
                       alert('Erro ao enviar os dados!');
                   }
               });
           }
       </script> --}}

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
