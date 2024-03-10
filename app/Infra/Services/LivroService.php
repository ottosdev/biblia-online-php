<?php

namespace App\Infra\Services;


use App\Http\Resources\LivroCollection;
use App\Http\Resources\LivroResource;
use App\Infra\Repositories\Interface\ILivroRepository;
use App\Infra\Repositories\LivroRepository;

class LivroService
{
    protected $livroRespository;

    public function __construct(LivroRepository $livroRespository)
    {
        $this->livroRespository = $livroRespository;
    }


    public function salvar(array $data)
    {
        $caminho = $data['capa']->store('capa', 'public');
        $data['capa'] = $caminho;
        return $this->livroRespository->create($data);
    }

    public function buscarPorId(int $id)
    {
        return $this->livroRespository->getBuscarLivroId($id);
    }

    public function buscarTodos()
    {
        return $this->livroRespository->getBuscarTodosOsLivros();
    }

    public function atualizar($livroId, $dados)
    {
        $livro = $this->livroRespository->find($livroId);
        $caminho = $dados['capa']->store('capa', 'public');
        $dados['capa'] = $caminho;
        $livro->update($dados);
        return $livro;
    }

    public function deletar(int $id)
    {
       return $this->livroRespository->destroy($id);
    }
}
