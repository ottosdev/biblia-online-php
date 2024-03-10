<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TestamentoCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            $this->collection->map(function($testamentos){
                return [
                    'id' => $testamentos->id,
                    'nome' => $testamentos->nome,
                    'livros' => LivroResource::collection($testamentos->whenLoaded('livros')),
                ];
            }),
        ];
    }
}
