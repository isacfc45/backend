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

    public function __construct(protected PerfilService $perfilService) {}

    public function index()
    {
        try {
            $usuario = $this->perfilService->getUsuarioAutenticado();
            return PerfilResource::make($usuario);
        } catch (\Throwable | \Exception $e) {
            return ResponseService::exception($e,  401);
        }
    }
}
