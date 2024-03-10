<?php

namespace App\Infra\Repositories;

use App\Models\Versiculo;

class VersiculoRepository extends BaseRepository
{
    protected $versiculo;
    public function __construct(Versiculo $versiculo)
    {
        parent::__construct($versiculo);
        $this->versiculo = $versiculo;
    }

    public function getVersiculoPorId(int $id) {
        return $this->versiculo::with(['livro'])->find($id);
    }

    public function getTodosversiculos() {
        return $this->versiculo::with(['livro'])->get();
    }

    public function getVersiculosPorCapitulo(int $livroId, int $capituloId) {
       return $this->versiculo::with(['livro'])
//           ->whereHas('livro', function($query) use ($posicaoId) {
//               $query->where('posicao', $posicaoId);
//           })
           ->where('capitulo', $capituloId)
           ->where('livro_id', $livroId)
            ->get();
    }

}
