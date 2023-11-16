<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginRequest;
use App\Services\IAuthService;
use App\Services\ResponseService;
use App\Transformers\AutenticatedUserResource;

class AuthController extends Controller
{
    private IAuthService $authService;

    public function __construct(IAuthService $authService)
    {
        $this->authService = $authService;
    }

    public function me()
    {
        return AutenticatedUserResource::make(auth()->user());
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        try {
            $token = $this->authService->login($credentials);
            return AutenticatedUserResource::make(auth()->user())
                ->additional([
                    'token' => $token,
                    'message' => 'Usuário autenticado com sucesso.'
                ]);
        } catch (\Throwable | \Exception $e) {
            return ResponseService::exception($e,  401);
        }
    }
}
