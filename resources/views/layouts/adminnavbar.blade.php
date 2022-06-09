<nav class="navbar navbar-expand-lg navbar-dark adminnavbar">
    <div class="container container-fluid">
        <a href="/dashboard" class="navbar-brand" style="font-size: 25px;">ADMIN PANEL</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto mt-2">
                @if (Route::has('login'))
                @auth
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link text-light" style="font-size: 1.2em; margin: 5px 10px 0 0">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('company') }}" class="nav-link text-light"
                        style="font-size: 1.2em; margin: 5px 10px 0 0">
                        Company
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('employee') }}" class="nav-link text-light"
                        style="font-size: 1.2em; margin: 5px 10px 0 0">
                        Employee
                    </a>
                </li>

                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a class="nav-link text-light" href="route('logout')">
                            <button class="btn btn-danger btn-md" onclick="event.preventDefault();
                                                        this.closest('form').submit();">Logout</button>

                        </a>
                    </form>
                </li>
                @else
                <li class="nav-item dropdown {{ Request::segment(1) === 'login' ? 'active' : null }}">
                    <a href="{{ route('login') }}" class="nav-link btn btn-success text-light btn-sm">Log In</a>
                </li>
                @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>