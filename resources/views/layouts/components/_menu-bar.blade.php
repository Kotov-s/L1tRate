<div class="app-container">
    <div class="my-navbar shadow-sm p-2">
        <div>
            <a class="home-link text-decoration-none mx-1" href="/">
                L1tRate
            </a>
        </div>
        <form method="GET" action="/search/">
            <div class="search-wrapper">
                <input name="search" id="search" class="search-input" type="text" placeholder="Search">

                <button type="submit" class="btn btn-link text-body text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="feather" viewBox="0 0 24 24">
                        <defs></defs>
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                </button>
            </div>
        </form>

        <div class="d-flex mt-1">
            @guest
                @if (Route::has('login'))
                    <a class="h6 me-2 text-decoration-none" style="color: #1e1b2d;"
                        href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif

                @if (Route::has('register'))
                    <a class="h6 me-2 text-decoration-none" style="color: #1e1b2d;"
                        href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img class="profile-img" src="{{ Auth::user()->profile_picture }}">
                    <span class="profile-txt">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end "
                    style="box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); border: white;" aria-labelledby="navbarDropdown">


                    <a class="dropdown-item"
                        style="--bs-dropdown-link-hover-bg: #f6fcff; color: black; --bs-dropdown-link-active-bg: #dcf3ff;"
                        href="\user\settings">
                        {{ __('Settings') }}
                    </a>

                    <a class="dropdown-item"
                        style="--bs-dropdown-link-hover-bg: #f6fcff; color: black; --bs-dropdown-link-active-bg: #dcf3ff;"
                        href="\rates\?user={{ Auth::user()->id }}">
                        {{ __('Check rates') }}
                    </a>

                    <a class="dropdown-item"
                        style="--bs-dropdown-link-hover-bg: #f6fcff; color: black; --bs-dropdown-link-active-bg: #dcf3ff;"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @endguest
        </div>
    </div>
</div>

<div style="margin-bottom: 80px;"></div>
