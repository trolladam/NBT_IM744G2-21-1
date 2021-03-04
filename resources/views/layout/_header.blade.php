<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">Bloggr</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link">About</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('auth.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        Sign out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
            @auth
                <a href="#" class="btn btn-outline-success btn-sm ms-md-3">Make a post</a>
            @else
                <a href="{{ route('auth.register') }}" class="btn btn-outline-success btn-sm ms-md-3">Sign up</a>
                <a href="{{ route('auth.login') }}" class="btn btn-outline-secondary btn-sm ms-md-3">Sign in</a>
            @endauth
        </div>
    </div>
</nav>
