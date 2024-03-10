<?php

namespace App\Infra\Services;

use App\Infra\Repositories\TestamentoRepository;
use App\Models\Testamento;

class TestamentoService
{
    protected $testamentoRespository;

    public function __construct(TestamentoRepository $testamentoRepository)
    {
        $this->testamentoRespository = $testamentoRepository;
    }

    public function buscarTodos()
    {
        return $this->testamentoRespository->getTestamentoComLivros();
    }

    public function salvar($testamento)
    {
        return $this->testamentoRespository->create($testamento);
    }

    public function buscarPorId(int $id)
    {
        return $this->testamentoRespository->getLivroId($id);
    }

    public function atualizar(array $testamento, int $id)
    {
        return $this->testamentoRespository->update($testamento, $id);
    }

    public function deletar(int $id)
    {
        return $this->testamentoRespository->destroy($id);
    }
}
