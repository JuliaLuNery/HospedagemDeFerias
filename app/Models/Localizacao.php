<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localizacao extends Model
{
    //Para não haver problemas com singular/plural - aqui identifiquei com singular porém, para o programa consultar no BD é necessário ter esta relação no plural já que o nome está plural
    protected $table = 'localizacoes';

    use HasFactory;

    protected $fillable = [
        'id',
        'bem_locavel_id',
        'cidade',
        'filial',
        'posicao',
    ];

    public function pesquisar(){
        return $this->belongsTo(BensLocaveis::class, 'bem_locavel_id');

    }

        public function bemLocavel()
    {
        return $this->hasMany(BensLocaveis::class);
    }


}
