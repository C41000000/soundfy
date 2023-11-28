<?php

namespace App\Services;

use App\Repositories\Interfaces\UsuarioProjetoInterface;

class UsuarioProjeto
{
    protected $repo;
    public function __construct(UsuarioProjetoInterface $repo)
    {
        $this->repo = $repo;
    }

    public function buscaUsuarios($id){
        return $this->repo->buscaUsuarios($id);
    }
}
