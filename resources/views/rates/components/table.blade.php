@props(['rates'])

<table class="m-auto shadow" style="width: 90%" >
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
                                <a class="my-font-color text-decoration-none"
                                    href="/book/{{ $rate->book->ISBN }}">{{ $rate->book->name }}</a>
                            </p>
                            <p><span class="pale-color">by</span> <a class="my-font-color text-decoration-none"
                                    href="/author/?author={{ $rate->book->author->id }}">{{ $rate->book->author->name }}</a>
                            </p>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="pale-color">{{ $rate->book->publication_year }}</p>
                </td>
                <td>
                    <p class="pale-color">{{ $rate->rating }}</p>
                </td>
                <td>
                    <p class="pale-color">
                        {{ date_format($rate->created_at, 'd.m.y') }}
                    </p>
                </td>
                @auth
                    @if (Auth::user()->id == $rate->user->id)
                        <td>
                            <form action="/rates/delete/{{ $rate->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn" type="submit">Delete</button>
                            </form>
                        </td>
                    @endif
                @endauth
            </tr>
            <tr>
        </tbody>
    @endforeach
</table>