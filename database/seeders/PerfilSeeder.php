<?php

namespace Database\Seeders;

use App\Models\perfil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $perfis = [
        [
            'id' => 1,
            'nome' => 'root'
        ],
        [
            'id' => 2,
            'nome' => 'admin'
        ],
        [
            'id' => 3,
            'nome' => 'consulta'
        ],
        [
            'id' => 4,
            'nome' => 'cadastro'
        ],
    ];

    DB::table('perfil')->insert($perfis);

    }
}