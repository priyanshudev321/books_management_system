<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

use App\Repositories\Interfaces\BookRepositoryInterface;

class BookController extends Controller
{
    protected $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function index()
    {
        try{
            $books = $this->bookRepository->all(10);
            return view('books.index', compact('books'));
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function showComments(Book $book)
    {
        try{
            $comments = $book->comments;
    
            return view('books.comments', compact('book', 'comments'));
        }catch( \Exception $e ){
            return back()->with('error', $e->getMessage());
        }
    }
}
