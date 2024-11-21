<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function store(Request $request, Book $book)
    {
        try{
            Log::info( "All inputs of adding comment :: ", $request->all() );
            $request->validate([
                'comment' => 'required|string|max:255',
            ]);
    
            $book->comments()->create([
                'user_id' => auth()->id(),
                'comment' => $request->comment,
            ]);
    
            return redirect()->route('books.index')->with('success', 'Comment added successfully!');
        }catch( \Exception $e ){
            return back()->with('error', $e->getMessage());
        }
    }

    public function create(Book $book)
    {
        try{
            return view('books.comment-form', compact('book'));
        }catch( \Exception $e ){
            return back()->with('error', $e->getMessage());
        }
    }
}
