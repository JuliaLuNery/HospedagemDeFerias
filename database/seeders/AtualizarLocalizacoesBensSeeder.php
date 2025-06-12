<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AtualizarLocalizacoesBensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $localizacoes = [
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6,
            7 => 7,
            8 => 8,
            9 => 9,
            10 => 10,
            11 => 11,
            12 => 12,
            13 => 13,
            14 => 14,
            15 => 15,
            16 => 16,
        ];

        foreach ($localizacoes as $bemId => $localizacaoId) {
            DB::table('bens_locaveis')
                ->where('id', $bemId)
                ->update(['localizacoes_id' => $localizacaoId]);
        }
    }

    }

