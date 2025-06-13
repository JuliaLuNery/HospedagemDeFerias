@extends('layouts.paginaInterna')

@section('content')
@csrf

<h1 class="text-[#1c1c6b] font-semibold">A sua reserva</h1>

<div
  class="block w-3/4 rounded-lg bg-white p-6 shadow-secondary-1 dark:bg-surface-dark dark:text-white text-surface">
  <h5
    class="mb-2 text-xl font-medium leading-tight">
    Card title
  </h5>
  <p class="mb-4 text-base">
    With supporting text below as a natural lead-in to additional content.
  </p>
  <button
    type="button"
    class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
    data-twe-ripple-init
    data-twe-ripple-color="light">
    Button
  </button>
</div>


<form method="POST" action="{{ route('reserva.store') }}">
    @csrf
    <!-- Campos ocultos -->
    @foreach ($dados as $k => $v)
        <input type="hidden" name="{{ $k }}" value="{{ $v }}">
    @endforeach

    <label><input type="radio" name="forma_pagamento" value="multibanco" required> Multibanco</label>
    <label><input type="radio" name="forma_pagamento" value="cartao"> Cartão</label>
    <label><input type="radio" name="forma_pagamento" value="paypal"> PayPal</label>

    <button type="submit">Prosseguir</button>
</form>

@endsection
