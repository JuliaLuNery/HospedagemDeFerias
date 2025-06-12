<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BensLocaveis extends Model
{
    /** @use HasFactory<\Database\Factories\BensLocaveisFactory> */
    use HasFactory;

    protected $table = 'bens_locaveis'; // Define a tabela no banco de dados

    // Campos que podem ser preenchidos
    protected $fillable = [
        'localizacoes_id',
        'marca_id',
        'modelo',
        'registo_unico_publico',
        'numero_quartos',
        'numero_hospedes',
        'numero_casas_banho',
        'numero_camas',
        'ano',
        'manutencao',
        'preco_diario',
        'observacao',
        'avaliacao'
    ];


    //Verificação e conversão
    // Cast para conversão de tipos
    protected $casts = [
        'manutencao' => 'boolean',
        'preco_diario' => 'decimal:2',
        'avaliacao' => 'decimal:1'
    ];

    /**
     * Relação com as reservas deste bem locável.
     */
    public function reservas()
    {
        return $this->hasMany(Reservas::class, 'bem_locavel_id');
    }

    // public function localizacao()
    // {
    //     return $this->hasOne(Localizacao::class, 'bem_locavel_id');
    // }

        public function localizacao()
    {
        return $this->belongsTo(Localizacao::class, 'localizacoes_id');
    }

    // Relaciona com outra tabela
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }


}
