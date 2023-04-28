<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $books = Book::orderBy('rate', 'desc');
        return view('list_of_books', [
            'books' => $books->paginate(25),
            'message' => 'You can explore high rated books:'
        ]);
        // return view('home');
    }
}
