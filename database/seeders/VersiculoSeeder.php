<?php

namespace Database\Seeders;

use App\Models\Versiculo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VersiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Versiculo::create([
            'capitulo' => 1,
            "versiculos" => 1,
            "texto" => "No princípio Deus criou os céus e a terra.",
            "livro_id" => 1,
        ]);
        Versiculo::create([
            'capitulo' => 1,
            "versiculos" => 2,
            "texto" => "Era a terra sem forma e vazia; trevas cobriam a face do abismo, e o Espírito de Deus se movia sobre a face das águas.",
            "livro_id" => 1,
        ]);

        Versiculo::create([
            'capitulo' => 1,
            "versiculos" => 3,
            "texto" => "Disse Deus: 'Haja luz'', e houve luz.",
            "livro_id" => 1,
        ]);
    }
}
