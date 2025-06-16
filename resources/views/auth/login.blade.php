<head>
    {{-- Fonte --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200..800&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

</head>

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="bg-neutral-200">

        <div class="flex h-full flex-wrap items-center justify-center text-neutral-800 font-[Work Sans] color-[#151516]">
            <div class="w-full">
                <div class="block rounded-lg bg-white shadow-lg dark:bg-neutral-800">
                    <div class="g-0 lg:flex lg:flex-wrap">

                        <div class="md:mx-6 md:p-12 font-[Work Sans] color-[#151516]">
                            <!-- Logo -->
                            <div class="text-center">
                                <img class="mx-auto w-48" src="Imagens/Logo_Principal.png" alt="Logo" />
                                <h4 class="mb-6 mt-4 pb-1 text-xl font-semibold font-[Oxanium]">
                                    O seu retiro de férias começa aqui!
                                </h4>
                            </div>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <p class="mb-4 text-justify font-medium">Por favor, faça o seu login:</p>

                                <!-- Email -->
                                <div class="relative mb-4" data-twe-input-wrapper-init>
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" type="email" name="email" :value="old('email')"
                                        required autofocus autocomplete="username"
                                        class="peer block w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all focus:placeholder:opacity-100 peer-focus:text-primary motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:peer-focus:text-primary"
                                        placeholder="Usuário" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="relative mb-4" data-twe-input-wrapper-init>
                                    <x-input-label for="password" :value="__('Password')" />
                                    <x-text-input id="password" type="password" name="password" required
                                        autocomplete="current-password"
                                        class="peer block w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all focus:placeholder:opacity-100 peer-focus:text-primary motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:peer-focus:text-primary"
                                        placeholder="Senha" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Remember Me -->
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" name="remember"
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" />
                                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>

                                <!-- Ações -->
                                <div class="mt-2">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                            href="{{ route('password.request') }}">
                                            {{ __('Esqueceu a sua senha?') }}
                                        </a>
                                    @endif
                                </div>

                                <div class="mt-8 flex items-center justify-center">
                                    <button type="submit"
                                        class="rounded bg-[#ff501a] px-7 py-3 text-s font-medium uppercase text-white shadow-md transition hover:shadow-lg focus:outline-none">
                                        {{ __('Log in') }}
                                    </button>
                                </div>

                            </form>

                            <!-- Botão de Registro -->
                            <div class="flex items-center justify-between mt-8">
                                <p class="text-sm">Ainda não possui uma conta? <br> <strong> Crie agora mesmo.</strong></p>
                                <form method="GET" action="{{ route('register') }}">
                                    @csrf
                                    <button type="submit"
                                        class="inline-block ml-9 rounded border-2 border-[#151516] bg-[#151516] px-6 py-3 text-xs font-medium uppercase leading-normal text-[#ededf2] transition duration-150 ease-in-out hover:bg-[#2a2a2c] hover:text-white focus:outline-none">
                                        Registrar
                                    </button>
                                </form>
                            </div>
                        </div> <!-- fim do md:mx-6 -->
                    </div> <!-- fim do g-0 -->
                </div> <!-- fim do bg-white block -->
            </div> <!-- fim do w-full -->
        </div> <!-- fim do flex h-full -->
    </section>
</x-guest-layout>

@vite(['resources/css/app.css', 'resources/js/app.js'])
