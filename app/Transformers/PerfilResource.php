<?php

namespace App\Http\Resources\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PerfilResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    public function toArray(Request $request): array
    {
        return parent::toArray([
            'name' => $this->name,
            'email' => $this->name,
            'nome_certificado' => $this->nome_certificado,
            'password' => $this->password,
            'google_id' => $this->google_id,
            'cpf' => $this->cpf,
            'genero' => $this->genero,
            'formacao' => $this->formacao,
            'telefone' => $this->telefone,
            'endereco' => $this->endereco,
            'formacao' => $this->formacao,
            'pne' => $this->pne,
            'descricao_pne' => $this->descricao_pne,
            'tipo' => $this->tipo,
            'img_profile' => $this->img_profile,
            'email_verified_at' => $this->email_verified_at

        ]);
    }
}
