<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="bg-neutral-200 dark:bg-neutral-700">

            <div class="flex h-full flex-wrap items-center justify-center text-neutral-800 font-[Work Sans] color-[#151516]">
                <div class="w-full">
                    <div class="block rounded-lg bg-white shadow-lg dark:bg-neutral-800">
                        <div class="g-0 lg:flex lg:flex-wrap">
                            <!-- Left column container -->
                                <div class="md:mx-6 md:p-12">
                                    <!-- Logo -->
                                    <div class="text-center">
                                        <img class="mx-auto w-48" src="Imagens/Logo_Principal.png" alt="Logo" />
                                        <h4 class="mb-12 mt-1 pb-1 text-xl font-semibold font-[Oxanium]">
                                            Hospedagem de Férias - o seu próximo lar
                                        </h4>
                                    </div>

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <p class="mb-4">Por favor, faça o seu login</p>

                                        <!-- Email -->
                                        <div class="relative mb-4" data-twe-input-wrapper-init>
                                            <x-input-label for="email" :value="__('Email')" />
                                            <input x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                                                class="peer block w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all focus:placeholder:opacity-100 peer-focus:text-primary motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:peer-focus:text-primary"
                                                placeholder="Usuário" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <!-- Password -->
                                        <div class="relative mb-4" data-twe-input-wrapper-init>
                                            <x-input-label for="password" :value="__('Password')" />
                                            <x-text-input id="password" type="password" name="password" required autocomplete="current-password"
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
                                        <div class="flex items-center justify-between mt-6">
                                            @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                    {{ __('Esqueceu a sua senha?') }}
                                                </a>
                                            @endif

                                            <button type="submit"
                                                class="rounded bg-gradient-to-r from-orange-500 via-pink-600 to-purple-700 px-6 py-2 text-xs font-medium uppercase text-white shadow-md transition hover:shadow-lg focus:outline-none">
                                                {{ __('Log in') }}
                                            </button>
                                        </div>
                                    </form>

                                    <!-- Botão de Registro -->
                                    <div class="flex items-center justify-between mt-6">
                                        <p class="text-sm">Não tem uma conta ainda?</p>
                                        <button type="button"
                                            class="inline-block rounded border-2 border-danger px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-danger-600 hover:bg-danger-50/50 hover:text-danger-600 focus:outline-none">
                                            Registrar
                                        </button>
                                    </div>
                                </div> <!-- fim do md:mx-6 -->
                        </div> <!-- fim do g-0 -->
                    </div> <!-- fim do bg-white block -->
                </div> <!-- fim do w-full -->
            </div> <!-- fim do flex h-full -->
    </section>
</x-guest-layout>
