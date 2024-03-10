<?php

namespace App\Infra\Repositories;

use App\Models\Testamento;

class TestamentoRepository extends BaseRepository
{
    protected $testamento;

    public function __construct(Testamento $testamento)
    {
        parent::__construct($testamento);
        $this->testamento = $testamento;
    }

    public function getTestamentoComLivros()
    {
        return $this->testamento::with(['livros'])->get();
    }

    public function getLivroId(int $id) {
      return  Testamento::with(['livros'])->find($id);
    }
}
