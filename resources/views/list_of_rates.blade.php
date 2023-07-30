@extends('layouts.base')
@section('content')
    @if ($rates->count())
        @if ($rates[0]->user->id == Auth::user()->id)
            <div class="d-flex h4 justify-content-center">Your rates:</div>
        @else
            <div class="d-flex h4 justify-content-center">{{ $rates[0]->user->name }}'s rates:</div>
        @endif

        <div style="font-size: 13px; " class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto py-8">
            @include('rates.components.table')
        </div>
    @else
        <div class="bg-white m-auto my-width p-4 rounded-4 shadow">
            @if ($users_rates)
                <p class="d-flex h5 justify-content-center">You have no ratings</p>
            @else
                <p class="d-flex h5 justify-content-center">The user has no ratings</p>
            @endif
        </div>
    @endif
    {{ $rates->links() }}
@endsection
