<?php

namespace App\Services;

class RedirectCommentService
{
    public function renderForm($book)
    {
        return '<a href="' . route('comments.create', $book->id) . '" 
                class="text-blue-500 hover:text-blue-700">Add Comment</a>';
    }
}
