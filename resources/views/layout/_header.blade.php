<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container justify-content-start">
        <a href="{{ route('home') }}" class="navbar-brand">Bloggr</a>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link">About</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
            </ul>
        </div>
        @auth
            <a href="#" class="btn btn-outline-success btn-sm ms-3">Make a post</a>
            <ul class="navbar-nav ms-3">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="rounded-circle" src="{{ Auth::user()->avatar }}" alt="Avatart" height="32"/>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li><span class="dropdown-item">{{ Auth::user()->full_name }}</span></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
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
            </ul>
        @else
            <a href="{{ route('auth.register') }}" class="btn btn-outline-success btn-sm ms-3">Get started</a>
        @endauth
    </div>
</nav>
