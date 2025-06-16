<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>

                <div class="max-w-sm mx-auto p-5">
                    @if (session('success'))
                        <div
                            class="alert alert-success shadow-lg rounded-lg py-4 px-6 font-semibold text-green-800 bg-green-100 ring-1 ring-green-300">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('send.email') }}" method="POST"
                        class="mt-5 flex flex-col items-center space-y-2 p-2 border-2 border-gray-500 rounded-lg shadow-lg bg-gray-100">
                        @csrf
                        <label for="pickup" class="text-lg font-medium text-gray-700">A sua reserva</label>
                        <input type="text" id="pickup" name="pickup" required />
                        <button type="submit"
                            class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                            data-twe-ripple-init data-twe-ripple-color="light">
                            Enviar dados da reserva por e-mail
                        </button>

                        {{-- <label for="pickup" class="text-lg font-medium text-gray-700">Local de levantamento da reserva:</label>
         <input type="text" id="pickup" name="pickup" required
            class="w-full max-w-md px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
         <button type="submit"
            class="bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300 text-white font-medium text-base md:text-lg rounded-full px-8 py-3 shadow-md hover:shadow-lg transition duration-300">
            Enviar confirmação por e-mail
         </button> --}}
                    </form>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
