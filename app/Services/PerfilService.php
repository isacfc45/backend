<?php

namespace App\Services;

use App\Services\IPerfilService;

class PerfilService implements IPerfilService
{
    public function getUsuarioAutenticado()
    {
        $usuarioId = auth()->user()->id;

        return User::find($usuarioId);
    }
}
