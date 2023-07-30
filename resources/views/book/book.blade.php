@extends('layouts.base')
@section('content')
    <main class="py-4 m-auto" style="width: 90%;">
        @include('book.components.book-card')
        @auth
            <form method="post" action="/comment/store" class="d-flex justify-content-center mb-5">
                @csrf
                <div class="p-3 rounded-5 shadow my-width">
                    <img class="profile-img" src="{{ Auth::user()->profile_picture }}">
                    <div>
                        <div class="mb-2 mx-2">
                            <strong> {{ Auth::user()->name }}</strong>
                        </div>
                        <input type="hidden" id="book_id" name="book_id" value="{{ $book->id }}">
                        <textarea placeholder="Write review" class="comment-textarea" name="message" id="message" cols="30"
                            rows="10"></textarea>
                        <button class="btn" type="submit">Send</button>
                    </div>
                </div>
            </form>
        @else
            <div class="bg-white m-auto mb-4 p-3 rounded-4 shadow my-width">
                <p style="margin: auto;">To comment this book you need to
                    <strong><a style="color: black; text-decoration: none;"href="/login">Login</a></strong> or
                    <strong><a style="color: black; text-decoration: none;" href="/register">Register</a></strong>
                </p>

            </div>
        @endauth

        @foreach ($comments as $comment)
            @include('book.components.book-comment')
        @endforeach

    </main>
@endsection