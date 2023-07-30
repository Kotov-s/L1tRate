@extends('layouts.base')
@section('content')
    <div class="bg-white m-auto p-3 rounded-3 shadow my-width">
        @if ($books->count())
            <div class="h6 mb-3">{{ $message }} </div>
            @foreach ($books as $book)
                <div class="container my-2">
                    <div class="row">
                        <div class="col">
                            <a href="/book/{{ $book->ISBN }}">
                                <img class="small-book-cover w-100 rounded-2" src="{{ $book->cover }}" alt="Book cover">
                            </a>
                        </div>
                        <div class="col-10">

                            <p class="m-0"><strong> <a class="text-decoration-none my-font-color"
                                        href="/book/{{ $book->ISBN }}">{{ $book->name }}</a> </strong></p>
                            <p class="m-0"><span style="color: #888888;">Publication year:</span>
                                {{ $book->publication_year }}</p>
                            <p class="m-0"><span style="color: #888888;">Book rate:</span> {{ $book->rate }}</p>
                            <p class="m-0"><span style="color: #888888;">Author: <a
                                        class="my-font-color text-decoration-none"
                                        href="/author/?author={{ $book->author->id }}">{{ $book->author->name }}</a></span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="list-info"> Sorry, can't find enything 😥 </div>
        @endif
    </div>
    <div class="d-flex justify-content-center">
        {{ $books->links() }}
    </div>
@endsection
