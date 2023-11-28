<?php

namespace App\Repositories\Eloquents;

use App\Models\ProjetoMusical;
use App\Repositories\Interfaces\ProjetoMusicalInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProjetoMusicalEloquent implements ProjetoMusicalInterface
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

    public function getAllFromProjects($id){

        return DB::table('projeto_musical AS pm1')
            ->select()
            ->join('projeto_musica AS pm', 'pm1.id_projeto', 'pm.id_projeto')
            ->join('musica AS m', 'pm.id_musica', 'm.id_musica')
            ->where('pm1.id_projeto', $id)
            ->get();
    }
}
