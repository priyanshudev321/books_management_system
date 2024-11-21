<?php

namespace App\Factories;

use App\Services\InlineCommentService;
use App\Services\RedirectCommentService;

class CommentFactory
{
    public static function create($type)
    {
        switch ($type) {
            case 'comment':
                return new RedirectCommentService();
            default:
                throw new \Exception("Invalid comment type provided.");
        }
    }
}
