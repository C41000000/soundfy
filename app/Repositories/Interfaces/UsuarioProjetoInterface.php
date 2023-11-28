<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface UsuarioProjetoInterface
{
    public function __construct(Model $model);
    public function getAll();

    public function store(array $data);
    public function getOne($id);

    public function update($id, array $data);

    public function destroy($id);

    public function buscaUsuarios($id);
}
