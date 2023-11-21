<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ResponseService;
use App\Services\IPerfilService;
use App\Services\PerfilService;
use App\Transformers\PerfilResource;

class PerfilController extends Controller
{
    private IPerfilService $perfilService;

    public function __construct(IPerfilService $perfilService)
    {
        $this->perfilService = $perfilService;
    }

    public function index()
    {
        try {
            $usuario = $this->perfilService->getUsuarioAutenticado();
            return PerfilResource::make($usuario);
        } catch (\Throwable | \Exception $e) {
            return ResponseService::exception($e,  401, "Usuário não autenticado");
        }
    }
}
