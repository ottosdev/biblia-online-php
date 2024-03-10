<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LivroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'posicao' => $this->posicao,
            'nome' => $this->nome,
            'abreviacao' => $this->abreviacao,
            'capa' => $this->capa,
            'testamento' => new TestamentoResource($this->whenLoaded('testamento')),
            'versiculos' => VersiculoResource::collection($this->whenLoaded('versiculos')),
//            'link' => [
//                [
//                    'rel' => 'Alterar um livro',
//                    'type' => 'PUT',
//                    'link' => route('livro.update', $this->id)
//                ],
//                [
//                    'rel' => 'Deletar um livro',
//                    'type' => 'DESTROY',
//                    'link' => route('livro.detroy', $this->id)
//                ]
//
//            ]
        ];
    }
}
