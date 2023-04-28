@extends('layouts.app')

@section('content')
    <main class="py-4" style="width: 50%; margin: 0 auto;">
        <div>


            <div>
                <div>
                    <div class="pb-3 projects-section">
                        <div class="projects-section-header">
                            <p>{{ __('Dashboard') }}</p>
                        </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
