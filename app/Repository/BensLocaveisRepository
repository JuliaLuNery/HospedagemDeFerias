<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class BensLocaveisRepository
{

    public function all()
    {
        $disponiveis = DB::table('bens_locaveis')->get();
        return $disponiveis;
        // return Model::all();
    }

    public function all_avalible($dataInicio, $dataFim, $hospedes)
    {
        // Se não houver filtros de data ou número de hóspedes, retorna todos os imóveis
        if (!$dataInicio || !$dataFim || !$hospedes) {
            $disponiveis = $this->all();
        } else {
            $disponiveis = DB::table('bens_locaveis')
            ->where('numero_hospedes', '>=', $hospedes) // Verifica se o imóvel pode acomodar o número de hóspedes
            ->whereNotExists(function ($query) use ($dataInicio, $dataFim) {
                // Subconsulta para verificar se o imóvel já está reservado no período
                $query->select(DB::raw(1))
                    ->from('reservas')
                    ->whereColumn('reservas.bem_locavel_id', 'bens_locaveis.id')
                    ->where('status', 'reservado') // Verifica se a reserva está com o status 'reservado'
                    ->where(function ($q) use ($dataInicio, $dataFim) {
                        // Verifica a sobreposição das datas
                        $q->where('data_inicio', '<=', $dataFim)
                          ->where('data_fim', '>=', $dataInicio);
                    });
            })
            ->orderBy('numero_hospedes', 'asc')
            ->get();
        }
        return $disponiveis;
    }


    public function find($id)
    {
        // return Model::findOrFail($id);
    }

    public function create(array $data)
    {
        // return Model::create($data);
    }

    public function update($id, array $data)
    {
        // $model = Model::findOrFail($id);
        // $model->update($data);
        // return $model;
    }

    public function delete($id)
    {
        // return Model::destroy($id);
    }
}
