<?php

namespace App\Transformers;

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

    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'nome_certificado' => $this->nome_certificado,
            'cpf' => $this->cpf,
            'telefone' => $this->telefone,
            'endereco' => $this->endereco,
            'cep' => $this->cep,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
            'formacao' => $this->formacao,
            'instituicao' => $this->instituicao,
            'area' => $this->area,
            'subarea' => $this->subarea,
            'img_profile' => $this->img_profile,
        ];
    }
}
