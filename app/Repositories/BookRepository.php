<?php

namespace App\Repositories;

use App\Models\Book;
use App\Repositories\Interfaces\BookRepositoryInterface;

class BookRepository implements BookRepositoryInterface
{
    public function all($perPage)
    {
        return Book::with('ratings', 'comments')->paginate($perPage);
    }

    public function find($id)
    {
        return Book::with('ratings', 'comments')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Book::create($data);
    }
}
