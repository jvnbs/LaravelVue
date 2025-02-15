<?php

namespace App\Repositories;

use App\Interfaces\BlogRepositoryInterface;
use App\Models\Blog;

class BlogRepository implements BlogRepositoryInterface
{
    protected $modelName;

    public function __construct(Blog $modelName)
    {
        $this->modelName = $modelName;
    }

    public function index()
    {
        return $this->modelName->all();
    }

    public function getById($id)
    {
        return $this->modelName->findOrFail($id);
    }

    public function store(array $data)
    {
        return $this->modelName->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->modelName->whereId($id)->update($data);
    }

    public function delete($id)
    {
        return $this->modelName->destroy($id);
    }

}
