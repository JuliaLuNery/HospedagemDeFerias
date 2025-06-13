<head>
    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('Imagens/Logo_Icone.png') }}" type="image/png">

    {{-- Fonte --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200..800&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

</head>

@extends('layouts.guest2')

<div class="flex items-center justify-center bg-[#1c1c6b]">

    <form class="bg-white p-6 rounded-lg shadow-md w-full max-w-md font-[Work Sans] color-[#151516]" method="POST"
    action="{{ route('register') }}">
    @csrf

    <h4 class="block text-2xl font-semibold text-slate-800 mb-5 mt-2">
        Registrar
    </h4>

    <div class="mb-1 flex flex-col gap-6">
        <!-- Nome -->
        <div class="w-full max-w-sm min-w-[200px]">
            <label for="nome" class="block mb-2 text-sm text-slate-600 font-semibold">
                Nome
            </label>
            <input name="nome" type="text" value="{{ old('nome') }}" required autofocus autocomplete="nome"
                class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                placeholder="Insira o seu nome" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="w-full max-w-sm min-w-[200px]">
            <label for="email" class="block mb-2 text-sm text-slate-600 font-semibold">
                E-mail
            </label>
            <input name="email" type="email" value="{{ old('email') }}" required autocomplete="username"
                class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                placeholder="Seu e-mail de contato" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- NIF -->
        <div class="w-full max-w-sm min-w-[200px]">
            <label for="nif" class="block mb-2 text-sm text-slate-600 font-semibold">
                NIF
            </label>
            <input name="nif" type="text" value="{{ old('nif') }}" required autocomplete="nif"
                class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                placeholder="Insira o seu NIF" />
            <x-input-error :messages="$errors->get('nif')" class="mt-2" />
        </div>

        <!-- Senha -->
        <div class="w-full max-w-sm min-w-[200px]">
            <label for="password" class="block mb-2 text-sm text-slate-600 font-semibold">
                Senha
            </label>
            <input name="password" type="password" required autocomplete="new-password"
                class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                placeholder="Insira a sua senha" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar Senha -->
        <div class="w-full max-w-sm min-w-[200px]">
            <label for="password_confirmation" class="block mb-2 text-sm text-slate-600 font-semibold">
                Confirmar Senha
            </label>
            <input name="password_confirmation" type="password" required autocomplete="new-password"
                class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                placeholder="Insira a sua senha novamente" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Checkbox -->
        <div class="inline-flex items-center mt-2">
            <label class="flex items-center cursor-pointer relative" for="check-2">
                <input type="checkbox"
                    class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800"
                    id="check-2" />
                <span
                    class="absolute text-white opacity-0 pointer-events-none peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor"
                        stroke="currentColor" stroke-width="1">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </label>
            <label class="cursor-pointer ml-2 text-slate-600 text-sm" for="check-2">
                Remember Me
            </label>
        </div>

        <!-- Botão -->
        <div class="mt-3 mb-0">
            <button
                class="mt-4 w-full rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="submit">
                Registrar
            </button>
        </div>
    </div>
</form>




</div>

