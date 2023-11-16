<?php

namespace App\Exceptions;

class UsuarioNaoEncontradoException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Usuário não encontrado.');
    }
}
