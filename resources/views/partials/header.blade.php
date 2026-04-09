<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}"><h2>interior<em>.</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('home') ? 'active': ''}}" href="{{route('home')}}">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('blog') || request()->routeIs('posts.category') || request()->routeIs('posts.show') ? 'active': ''}}" href="{{route('blog')}}">Blog Entries</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('contact') ? 'active': ''}}" href="{{route('contact')}}">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('author') ? 'active' : '' }}"
                           href="{{ route('author') }}">
                            Author
                        </a>
                    </li>

                </ul>
                @if (Route::has('login'))
                    <div class="auth-nav d-flex align-items-center ms-4">
                        @auth
                            @if(auth()->user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="auth-link">
                                Dashboard
                            </a>
                            @else
                                <form method="POST" action="{{ route('logout') }}" class="ms-2">
                                    @csrf
                                    <button type="submit" class="auth-link">
                                        Logout
                                    </button>
                                </form>
                            @endif

                        @else
                            <a href="{{ route('login') }}" class="auth-link">
                                Log In
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="auth-link auth-link-filled">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif

            </div>

        </div>
    </nav>
</header>
