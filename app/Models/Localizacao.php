<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localizacao extends Model
{
       use HasFactory;

    protected $fillable = [
        'id',
        'bem_locavel_id',
        'cidade',
        'filial',
        'posicao',
    ];

    public function pesquisar(){
        return $this->belongsTo(BensLocaveis::class && Reservas::class);

    }


}
