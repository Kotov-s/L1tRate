@props(['book'])

<div  class="book-section shadow">

    <img class="book-cover" src="{{ $book->cover }}" alt="Book cover">

    <div class="mx-3 ">
        <div class="h4 mb-4"> <strong>{{ $book->name }}</strong>  </div>
        <div class="my-1"> <strong>Author:</strong> <a class="text-decoration-none my-font-color " href="/author/?author={{$book->author_id}}">{{ $book->author->name }}</a></div>
        <div class="my-1"> <strong>Year:</strong> {{ $book->publication_year }} </div>
        <div class="my-1"> <strong>ISBN:</strong> {{ $book->ISBN }}</div>
        <div class="my-1"> <strong>Categories:</strong> {{ $book->genre->genre }}
        </div>
        <div class="my-1"> <strong>Number of
                pages: </strong>{{ $book->number_of_pages }}</div>
        <div>{{ $book->excerpt }} </div>

        @auth
            @include('book/components/_rating')
        @endauth

        <div class="card-information" style="margin-top: 10px"> <strong>Rating:</strong> {{ $book->rate }} <strong
                style="color: #ff942e">/</strong> <strong>Count:</strong> {{ $book->number_of_rates }}</div>
        <div class="card-information" style="margin-top: 10px"> </div>

    </div>
</div>
