@extends('layouts.app')
@section('content')
    <style>
        @media only screen and (max-width: 600px) {
            .m-auto {
                width: 100%;
            }

        }
    </style>
    @if ($rates->count())
        @if ($rates[0]->user->id == Auth::user()->id)
            <center>
                <div class="home-link" style="margin-top: 20px">Your rates:</div>
            </center>
        @else
            <center>
                <div class="home-link" style="margin-top: 20px">{{$rates[0]->user->name}}'s rates:</div>
            </center>
        @endif

        <div style="font-size: 13px; ">
            <div class="py-8">
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div>
                        <table class="m-auto">
                            <thead>
                                <tr style="background-color: aliceblue">
                                    <th>
                                        <span>№</span>
                                    </th>
                                    <th>
                                        Book
                                    </th>
                                    <th>
                                        Year
                                    </th>
                                    <th>
                                        Rate
                                    </th>
                                    <th>
                                        Rate date
                                    </th>

                                    <th>
                                    </th>

                                </tr>
                            </thead>

                            @php
                                $count = 1;
                            @endphp

                            @foreach ($rates as $rate)
                                <tbody style="background-color: {{ $count % 2 ? 'white' : '#f6fcff' }} ">
                                    <tr>
                                        <td>
                                            @php
                                                echo $count;
                                                $count += 1;
                                            @endphp
                                        </td>
                                        <td>
                                            <div>
                                                <div>
                                                </div>
                                                <div>
                                                    <p>
                                                        <a class="author-link"
                                                            href="/book/{{ $rate->book->ISBN }}">{{ $rate->book->name }}</a>
                                                    </p>
                                                    <p><span style="color: #888888;">by</span> <a class="author-link"
                                                            href="/author/?author={{ $rate->book->author->id }}">{{ $rate->book->author->name }}</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p style="color: #888888;">{{ $rate->book->publication_year }}</p>
                                        </td>
                                        <td>
                                            <p style="color: #888888;">{{ $rate->rating }}</p>
                                        </td>
                                        <td>
                                            <p style="color: #888888;">
                                                {{ date_format($rate->created_at, 'd.m.y') }}
                                            </p>
                                        </td>
                                        @auth
                                            @if (Auth::user()->id == $rate->user->id)
                                                <td>
                                                    <form action="/rates/delete/{{ $rate->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="submit-btn-no-decorations" type="submit">Delete</button>
                                                    </form>
                                                </td>
                                            @endif
                                        @endauth
                                    </tr>
                                    <tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @else
    <center>
        <div class="home-link" style="margin-top: 20px">No ratings</div>
    </center>
    @endif
    {{ $rates->links() }}
@endsection
