<?php

namespace App\Services\Base;

use App\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Model;

abstract class BaseService
{
    protected $repository;
    

    public function __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get all records
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->repository->getAll();
    }

    /**
     * Get paginated records
     *
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate(int $perPage = 10)
    {
        return $this->repository->paginate($perPage);
    }

    /**
     * Find a record by ID
     *
     * @param int $id
     * @return Model|null
     */
    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * Find a record by ID or fail
     *
     * @param int $id
     * @return Model
     */
    public function findOrFail(int $id)
    {
        return $this->repository->findOrFail($id);
    }

    /**
     * Create a new record
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    /**
     * Update an existing record
     *
     * @param Model $model
     * @param array $data
     * @return bool
     */
    public function update(Model $model, array $data)
    {
        return $this->repository->update($model, $data);
    }

    /**
     * Delete a record
     *
     * @param Model $model
     * @return bool|null
     */
    public function delete(Model $model)
    {
        return $this->repository->delete($model);
    }
}
