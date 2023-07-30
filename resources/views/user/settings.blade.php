@extends('layouts.base')

@section('content')
    <main class="py-4 auth-card bg-white m-auto my-width p-4 rounded-5 shadow">
        <p class="h4">Settings</p>
        <div>
            <form method="POST" action="/user/settings" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <label for="profile_picture" class="col-md-4 col-form-label text-md-end">Change profile
                        picture</label>
                    <div class="col-md-6">
                        <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                        @error('profile_picture')
                            <span class="invalid-feedback" role="alert"></span>
                            <div style="color: red; font-size: smaller;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Change name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" name="name" class="form-control"
                            value="{{ Auth::user()->name }}" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert"></span>
                            <div style="color: red; font-size: smaller;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <center style="font-style: italic;">
                        You can change either your profile picture or your name.
                    </center>
                    <div >
                        <button class="mt-4 btn btn-primary" type="submit">
                            Change
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
