<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rates;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatesController extends Controller
{
    public function show()
    {
        Paginator::useTailwind();
        $search =  (int)request('user');

        $rates = Rates::where('user_id', $search)
            ->orderBy('created_at', 'desc');
        
        return view('list_of_rates', [
            'rates' => $rates->paginate(25),
            'users_rates' => ($search == Auth::user()->id) ? true : false
        ]);
    }

    public function delete(Rates $rate)
    {
        $rate->delete();
        return back();
    }

    public function store()
    {
        $bookId = Book::where('ISBN', (int)request('bookId'))->first()->id;
        $userId = Auth::user()->id;
        $rating =(int)request('value');
        Rates::updateOrCreate(
            ['book_id' => $bookId, 'user_id' => $userId],
            ['rating' => $rating]
        );
    }

    public function check()
    {
        $book_id = Book::where('ISBN', (int)request('bookId'))->first()->id;
        $user_id = Auth::user()->id;
        $exists = Rates::where('book_id', $book_id)->where('user_id', $user_id)->exists();
        if ($exists){
            $rating = Rates::where('book_id', $book_id)->where('user_id', $user_id)->first()->rating;
            return response()->json(['success' => true, 'value' => $rating]);
        }
            
    }
}
