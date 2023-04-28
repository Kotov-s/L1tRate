@extends('layouts.app')

@section('content')
    <main class="py-4 auth-card">
        <div>
            <div>
                <div>
                    <div class="pb-3 projects-section">
                        <div class="projects-section-header">
                            <p>Settings</p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/user/settings" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="profile_picture" class="col-md-4 col-form-label text-md-end">Change profile picture</label>
                                    <div class="col-md-6">
                                        <label for="profile_picture" class="custom-file-input-label">Choose file</label>
                                        <input type="file" name="profile_picture" id="profile_picture" class="custom-file-input">
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
                                   <center style="font-style: italic;">You can change either your profile picture or your name.</center> 
                                    <div style="margin-top: 10px" class="col-md-8 offset-md-4">
                                        <button class="btn btn-primary" type="submit">
                                            Change
                                        </button>
                                        

                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
