<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    /** @use HasFactory<\Database\Factories\ReservasFactory> */
    use HasFactory;

    protected $table = 'reservas';

    protected $fillable = [
        'user_id',
        'bem_locavel_id',
        'data_inicio',
        'data_fim',
        'preco_total',
        'status',
        'timestamps',
    ];

    protected $casts = [
        'data_inicio' => 'date',
        'data_fim' => 'date',
        'preco_total' => 'decimal:2'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function bemLocavel()
    {
        return $this->belongsTo(BensLocaveis::class, 'bem_locavel_id');
    }


    public function isAtiva()
    {
        return $this->status === 'reservado' && $this->data_fim->isFuture();
    }
}
