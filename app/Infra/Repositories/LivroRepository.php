<?php

namespace App\Infra\Repositories;

use App\Infra\Repositories\Interface\ILivroRepository;
use App\Models\Livro;

class LivroRepository extends BaseRepository
{

    protected $livro;

    public function __construct(Livro $livro)
    {
        parent::__construct($livro);
        $this->livro = $livro;
    }

    public function getBuscarLivroId(int $id)
    {
        return $this->livro::with(['testamento', 'versiculos'])->find($id);
    }

    public function getBuscarTodosOsLivros() {
        return $this->livro::with(['testamento', 'versiculos'])->get();
    }

}
