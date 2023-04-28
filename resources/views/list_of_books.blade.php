@extends('layouts.app')
@section('content')
    <div class="list-of-books">
        @if ($books->count())
            <div class="list-info" style="margin-bottom: 20px"> {{$message}} </div>
            @foreach ($books as $book)
                <a href="/book/{{ $book->ISBN }}" style="color: black; text-decoration: none;">
                    <div class="small-book-link">
                        <div style="margin-bottom: 10px">
                            <img class="small-book-cover" src="{{ $book->cover }}" alt="Book cover">
                            <div>
                                <div>
                                    <strong>{{ $book->name }}</strong>
                                </div>
                                <div>
                                    <span style="color: #888888;">Publication year:</span> {{ $book->publication_year }}
                                </div>
                                <div>
                                    <span style="color: #888888;">Book rate:</span> {{ $book->rate }}
                                </div>
                                <div>
                                    <span style="color: #888888;">Author: <a class="author-link" href="/author/?author={{ $book->author->id }}">{{ $book->author->name }}</a></span> 
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            <div class="list-info"> Sorry, can't find enything 😥 </div>
        @endif
    </div>
    {{ $books->links() }}
@endsection
