<?php

namespace App\Http\Controllers;

use App\Http\Resources\TestamentoCollection;
use App\Infra\Services\TestamentoService;
use App\Models\Testamento;
use Illuminate\Http\Request;

class TestamentoController extends Controller
{
    public function __construct(protected TestamentoService $testamentoService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([ 'data' => $this->testamentoService->buscarTodos()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $testamento = $this->testamentoService->salvar($request->all());
        if (!$testamento) {
            return response()->json(['message' => 'Error ao cadastrar livro'], 404);
        }
        return response()->json([
            'data' => $testamento,
            'message' => 'Testamento cadastrado com sucesso'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $testamento = $this->testamentoService->buscarPorId($id);
        if (!$testamento) {
            return response()->json(['message' => 'Error ao pesquisar o testamento'], 404);
        }
        return response()->json(['data' => $testamento], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $testamento = $this->testamentoService->atualizar($request->all(), $id);
        if (!$testamento) {
            return response()->json(['message' => 'Nenhum dado encontrado'], 404);
        }
        return response()->json([
            'message' => 'Testamento atualizado com sucesso',
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $testamento)
    {
        $testamento = $this->testamentoService->deletar($testamento);
        if (!$testamento) {
            return response()->json(['message' => 'Error ao deletar o Testamento'], 404);
        }
        return response()->json([
            'message' => 'Testamento deletado com sucesso',
        ], 200);
    }
}
