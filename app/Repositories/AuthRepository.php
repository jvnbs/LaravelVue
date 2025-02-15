<?php

namespace App\Repositories;

use App\Interfaces\AuthRepositoryInterface;
use App\Models\User;

class AuthRepository implements AuthRepositoryInterface
{
    protected $modelName;

    public function __construct(User $modelName)
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

    public function register(array $data)
    {
        return $this->modelName->create($data);
    }

    public function login(array $data)
    {
        return $this->modelName->create($data);
    }


}
