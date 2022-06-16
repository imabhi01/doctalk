<header>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <a class="navbar-brand mr-2" href="{{ url('/') }}"><img src="{{ asset('images/gogaming.png') }}" alt="sliders" width="100%"></a>
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item @if(request()->route()->getName() == 'home') active @endif">
            <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item @if(request()->route()->getName() == 'cd') active @endif">
            <a class="nav-link" href="{{ route('cd') }}">CD Products</a>
            </li>
            <li class="nav-item @if(request()->route()->getName() == 'book') active @endif">
            <a class="nav-link" href="{{ route('book') }}">Book Products</a>
            </li>

            <li class="nav-item @if(request()->route()->getName() == 'orders') active @endif">
                <a class="nav-link" href="{{ route('orders') }}">My Orders</a>
            </li>

        </ul>
            
        <form class="d-flex" id="form" action="{{ route('logout') }}" method="POST">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
            @guest
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            @else
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome {{ auth()->user()->name }}!
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    @can('isAdmin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('product/index') }}">Go To Dashboard</a>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders') }}">My Orders</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('form').submit();">
                        {{ __('Logout') }}
                        </a>
                    </li>
                </ul>
            </div>
            @endguest
            </ul>
            @csrf
        </form>
        </div>
    </div>
    </nav>
</header>