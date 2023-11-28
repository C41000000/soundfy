<?php

namespace App\Services;

use App\Repositories\Interfaces\ProjetoMusicalInterface;

class ProjetoMusical
{
    protected $repo;
    public function __construct(ProjetoMusicalInterface $repo)
    {
        $this->repo = $repo;
    }

    public function buscaMusicas($id_projeto){
        return $this->repo->getAllFromProjects($id_projeto);
    }
}
