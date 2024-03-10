<?php

namespace Database\Seeders;

use App\Models\Livro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Livro::create([
            'nome' => 'Genesis',
            'abreviacao' => 'gen',
            'posicao' => 1,
            'testamento_id' => 1
        ]);
        Livro::create([
            'nome' => 'Êxodo',
            'abreviacao' => 'ex',
            'posicao' => 2,
            'testamento_id' => 1
        ]);
    }
}
