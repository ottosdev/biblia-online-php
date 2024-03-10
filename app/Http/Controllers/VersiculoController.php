<?php

namespace App\Http\Controllers;

use App\Infra\Services\VersiculoService;
use App\Models\Versiculo;
use Illuminate\Http\Request;

class VersiculoController extends Controller
{

    public function __construct(protected VersiculoService $versiculoService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => $this->versiculoService->buscarTodosOsVercilos()
        ]);
    }

    public function showCapituloVersiculo(int $livroId, int $capituloId) {
        return response()->json([
            'data' => $this->versiculoService->buscarCapituloVersiculos($livroId, $capituloId)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $versiculo = $this->versiculoService->salvar($request->all());

        if (!$versiculo) {
            return response()->json(['message' => 'Error ao cadastrar versiculo'], 404);
        }

        return response()->json([
            'message' => 'Versiculo cadastrado com sucesso',
            'data' => $versiculo
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $versiculo = $this->versiculoService->buscarPorId($id);
        if (!$versiculo) {
            return response()->json(['message' => 'Error ao pesquisar o versiculo'], 404);
        }

        return response()->json(['data' => $versiculo], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $versiculo = $this->versiculoService->atualizar($request->all(), $id);

        if (!$versiculo) {
            return response()->json(['message' => 'Error ao atualizar o versiculo'], 404);
        }

        return response()->json([
            'message' => 'Versiculo atualizado com sucesso',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $versiculo = $this->versiculoService->deletar($id);

        if (!$versiculo) {
            return response()->json(['message' => 'Error ao deletar o versiculo'], 404);
        }

        return response()->json([
            'message' => 'Versiculo deletado com sucesso',
        ], 204);
    }
}
