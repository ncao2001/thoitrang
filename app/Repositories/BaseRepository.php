<?php

namespace App\Repositories;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    abstract public function getModel();

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $object = $this->model->find($id);
        return $object->update($data);
    }

    public function delete($id)
    {
        $object = $this->model->find($id);
        return $object->delete($object);
    }

    public function searchAndPaginate($searchBy, $keyword, $perPage = 5)
    {
        return $this->model
            ->where($searchBy,'like','%'.$keyword.'%')
            ->orderBy('id', 'asc')
            ->paginate($perPage)
            ->appends(['search'=>$keyword]);
    }
}


