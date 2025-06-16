<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reserva</title>
</head>
<body>
    <h1>Reserva #{{ $reserva->id }}</h1>
    <p><strong>Modelo:</strong> {{ $reserva->bemLocavel->modelo }}</p>
    <p><strong>Localização:</strong> {{ $reserva->bemLocavel->localizacao->cidade }} - {{ $reserva->bemLocavel->localizacao->filial }}</p>
    <p><strong>Data de início:</strong> {{ $reserva->data_inicio }}</p>
    <p><strong>Data de fim:</strong> {{ $reserva->data_fim }}</p>
    <p><strong>Preço total:</strong> €{{ number_format($reserva->preco_total, 2, ',', '.') }}</p>
    <p><strong>Status:</strong> {{ ucfirst($reserva->status) }}</p>
</body>
</html>
