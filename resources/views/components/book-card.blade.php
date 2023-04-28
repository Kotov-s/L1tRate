@props(['book'])

<div class="book-section">

    <img class="book-cover" src="{{ $book->cover }}" alt="Book cover">

    <div class="book-info">
        <div class="book-name"> {{ $book->name }} </div>
        <div class="card-information" style="margin-top: 5px"> <strong>Author:</strong> <a class="author-link" href="/author/?author={{$book->author_id}}">{{ $book->author->name }}</a></div>
        <div class="card-information" style="margin-top: 5px"> <strong>Year:</strong> {{ $book->publication_year }} </div>
        <div class="card-information" style="margin-top: 5px"> <strong>ISBN:</strong> {{ $book->ISBN }}</div>
        <div class="card-information" style="margin-top: 5px"> <strong>Categories:</strong> {{ $book->genre->genre }}
        </div>
        <div class="card-information" style="margin-top: 5px"> <strong>Number of
                pages: </strong>{{ $book->number_of_pages }}</div>
        <div class="book-excerpt">{{ $book->excerpt }} </div>

        @auth
            @include('_rating')
        @endauth

        <div class="card-information" style="margin-top: 10px"> <strong>Rating:</strong> {{ $book->rate }} <strong
                style="color: #ff942e">/</strong> <strong>Count:</strong> {{ $book->number_of_rates }}</div>
        <div class="card-information" style="margin-top: 10px"> </div>

    </div>
</div>
