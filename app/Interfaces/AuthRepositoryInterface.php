<?php

namespace App\Interfaces;

interface AuthRepositoryInterface
{
    public function index();
    public function getById($id);
    public function register(array $data);
    public function login(array $data);

}
