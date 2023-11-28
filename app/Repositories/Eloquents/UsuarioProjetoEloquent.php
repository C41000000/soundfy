<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Interfaces\UsuarioProjetoInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsuarioProjetoEloquent implements UsuarioProjetoInterface
{
    private $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function getOne($id)
    {
        return $this->model->find($id);
    }

    public function update($id, array $data)
    {
        $result = $this->model->find($id);
        $result->update($data);

        return $result;
    }

    public function destroy($id)
    {
        return $this->model->delete($id);
    }
    public function buscaUsuarios($id){
        return DB::table('usuario_projeto AS pm')
            ->select()
            ->join('users AS u', 'u.usr_id', 'pm.usr_id')
            ->where('pm.id_projeto', $id)
            ->get();
    }
}
