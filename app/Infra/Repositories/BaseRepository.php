<?php

namespace App\Infra\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository {
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all instances of model
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Create a new record in the database
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Get the specified record by ID
     *
     * @param string $id
     * @return Model
     */
    public function getOne(string $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Update record in the database
     *
     * @param array $data
     * @param $id
     * @return bool
     */
    public function update(array $data, $id)
    {
        $record = $this->getOne($id);
        return $record->update($data);
    }

    /**
     * Remove record from the database
     *
     * @param $id
     * @return bool
     */
    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * Find a model by its primary key.
     *
     * @param $id
     * @return Model
     */
    public function find($id)
    {
        return $this->model->find($id);
    }
}
