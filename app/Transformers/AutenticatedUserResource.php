<?php

namespace App\Transformers;

use App\Services\ResponseService;
use Illuminate\Http\Resources\Json\JsonResource;

class AutenticatedUserResource extends JsonResource
{
    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email
        ];
    }
}
