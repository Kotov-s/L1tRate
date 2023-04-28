@extends('layouts.app')
@section('content')
    <style>
        @media only screen and (max-width: 600px) {
            .book-cover {
                width: 65px;
                height: 92px;
                object-fit: cover;
                margin-right: 4px;
                left: 10px;
                border-radius: 2%;
                float: left
            }
            .login-register-section {
                width: 100%;
            }
            .comment-section {
                width: 80%;
            }
        }
    </style>
    <main class="py-4" style="width: 90%; margin: 0 auto;">
        <x-book-card :book='$book' />
        @auth
            <form method="post" action="/comment/store">
                @csrf

                <div style="background-color: #f9f9f9" class="comment-section message-box">
                    <div style="display: flex;">
                        <img class="profile-img" src="{{ Auth::user()->profile_picture }}">
                        <span class="profile-txt">{{ Auth::user()->name }}</span>
                    </div>
                    <input type="hidden" id="book_id" name="book_id" value="{{ $book->id }}">
                    <textarea placeholder="Write review" class="comment-textarea" name="message" id="message" cols="30"
                        rows="10"></textarea>
                    <button type="submit" class="comment-textare-button btn btn-primary"> Send</button>
                </div>
            </form>
        @else
            <div style="background-color: #ffffff; margin-bottom: 20px" class="login-register-section">
                <p style="margin: auto;">To comment this book you need to
                    <strong><a style="color: black; text-decoration: none;"href="/login">Login</a></strong> or
                    <strong><a style="color: black; text-decoration: none;" href="/register">Register</a></strong>
                </p>

            </div>
        @endauth

        @foreach ($comments as $comment)
            <x-book-comment :comment='$comment' />
        @endforeach


    </main>
@endsection
