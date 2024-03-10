<?php

namespace App\Http\Controllers;

use App\Http\Resources\LivroCollection;
use App\Http\Resources\LivroResource;
use App\Infra\Services\LivroService;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller

{
    public function __construct(protected LivroService $livroService)
    {
    }

    public function index()
    {
        $livros = $this->livroService->buscarTodos();
        return LivroResource::collection($livros);
    }

    public function store(Request $request)
    {
        $livro = $this->livroService->salvar($request->all());

        if ($livro) {
            return response()->json(new LivroResource($livro), 201);
        }

        return response()->json(['message' => 'Error ao cadastrar livro'], 404);
    }

    public function show(int $id)
    {
        $livro = $this->livroService->buscarPorId($id);
        if (!$livro) {
            return response()->json(['message' => 'Livro não encontrado'], 404);
        }
        return response()->json(['data' => new LivroResource($livro)], 200);
    }

    public function update(Request $request, string $livro)
    {
        $livro = $this->livroService->atualizar($livro, $request->all());
        if (!$livro) {
            return response()->json(['message' => 'Error ao atualizar o livro'], 404);
        }
        return response()->json([
            'message' => 'Livro atualizado com sucesso',
        ], 201);

    }

    public function destroy(int $id)
    {
        $livro = $this->livroService->deletar($id);

        if (!$livro) {
            return response()->json(['message' => 'Error ao deletar o livro'], 404);
        }

        return response()->json([
            'message' => 'Livro deletado com sucesso',
        ], 204);

    }
}
