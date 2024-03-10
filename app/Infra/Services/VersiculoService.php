<?php

namespace App\Infra\Services;

use App\Infra\Repositories\VersiculoRepository;

class VersiculoService
{
    protected $versiculoRespository;

    public function __construct(VersiculoRepository $versiculoRespository)
    {
        $this->versiculoRespository = $versiculoRespository;
    }

    public function salvar(array $data)
    {
        return $this->versiculoRespository->create($data);
    }

    public function atualizar(array $data, int $id)
    {
        return $this->versiculoRespository->update($data, $id);
    }

    public function buscarTodosOsVercilos() {
        return $this->versiculoRespository->getTodosversiculos();
    }

    public function buscarPorId(int $id) {
        return $this->versiculoRespository->getVersiculoPorId($id);
    }

    public function deletar(int $id) {
        return $this->versiculoRespository->destroy($id);
    }

    public function buscarCapituloVersiculos(int $livroId, int $capituloId) {
        return $this->versiculoRespository->getVersiculosPorCapitulo($livroId, $capituloId);
    }
}
