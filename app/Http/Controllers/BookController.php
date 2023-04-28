<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class BookController extends Controller
{
    public function show(Book $book)
    {
        $comments = $book->comment()->orderBy('created_at', 'desc')->get();
        return view('book', [
            'book' => $book,
            'comments' => $comments
        ]);
    }


    public function search()
    {
        Paginator::useTailwind();
        $search =  request('search');
        $booksByName = Book::where('name', 'like', '%' . $search . '%');
        $booksByExcerpt = Book::where('excerpt', 'like', '%' . $search . '%');
        $booksByOtherAttributes = Book::where('publication_year', (int)$search)
            ->orWhere('ISBN', (int)$search)
            ->orWhereHas('author', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        $books = $booksByName->union($booksByOtherAttributes)->union($booksByExcerpt);
    
        return view('list_of_books', [
            'books' => $books->paginate(25),
            'message' => 'Here is books what match your search input:'
        ]);
    }

    public function author()
    {
        Paginator::useTailwind();
        $search =  request('author');
        $books = Book::where('author_id', (int)$search)
            ->orderBy('publication_year', 'asc');
        $author_name = $books->first()->author->name;
        return view('list_of_books', [
            'books' => $books->paginate(25),
            'message' => 'Here books of ' . $author_name
        ]);
    }
}
