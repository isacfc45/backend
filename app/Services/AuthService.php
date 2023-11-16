<?php

namespace App\Services;

class AuthService implements IAuthService
{
    public function login(array $credentials)
    {
        if ($token = auth()->attempt($credentials)) {
            return $token;
        }

        throw new \Exception('Usuário ou senha inválidos.');
    }
}
