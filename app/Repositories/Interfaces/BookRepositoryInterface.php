<?php

namespace App\Repositories\Interfaces;

interface BookRepositoryInterface
{
    public function all($perPage);
    public function find($id);
    public function create(array $data);
}
