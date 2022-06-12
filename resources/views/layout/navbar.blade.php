<nav class="navbar my-4 d-lg-block d-none">
    <div class="container">
        <a href="{{ route('landing') }}" style="text-decoration: none;" class="d-flex flex-row align-items-center justify-content-center">
            <img class="mx-2" src="{{url('images/logo.png')}}" height="50px">
            <div class="fs-4 fw-bold">Hello Medicine</div>
            @if(Auth::check())
            @if (Auth::user()->role == 'admin')
                <div class="mx-1 text-danger fw-bold mb-1">Admin</div>
            @endif
            @endif
        </a>
        <ul class="nav justify-content-center fs-5">
            <li class="nav-item mx-2">
                <!-- give active link to the current page -->
                <a class="nav-link {{ Request::url() == ('http://localhost:8000/landing') ? 'active' : 'text-dark' }}" href="{{ route('landing') }}">Home</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link {{ Request::url() == ('http://localhost:8000/medicine') || Request::route()->uri == 'medicine/show/{id}' || Request::route()->uri == 'medicine/search' ? 'active' : 'text-dark' }}" href="{{ route('medicine') }}">Medicine</a>
            </li>
            @if(Auth::check())
            @if (Auth::user()->role == 'admin')
            <li class="nav-item mx-2">
                <a class="nav-link position-relative {{ Request::url() == ('http://localhost:8000/orders') ? 'active' : 'text-dark' }}" href="{{ route('orders') }}">Pesanan
                    <span class="position-absolute top-20 start-100 translate-middle badge rounded-pill bg-danger">
                    @php
                        $order = App\Http\Controllers\OrderController::getOrderCount();
                    @endphp
                        {{ $order }}
                        <span class="visually-hidden">New Order</span>
                    </span>
                </a>
            </li>
            @else
            <li class="nav-item mx-2">
                <a class="nav-link position-relative {{ Request::url() == ('http://localhost:8000/myorder') ? 'active' : 'text-dark' }}" href="{{ route('myorder') }}">Keranjang
                    <span class="position-absolute top-20 start-100 translate-middle badge rounded-pill bg-danger">
                    @php
                        $order = App\Http\Controllers\OrderController::getUserOrderCount();
                    @endphp
                        {{ $order }}
                        <span class="visually-hidden">New Order</span>
                    </span>
                </a>
            </li>
            @endif
            @endif
        </ul>
        <!-- search form -->
        <form action="{{ route('medicine.search') }}" method="POST" class="form-inline d-flex my-2 my-lg-0">
            @csrf
            <input class="form-control mr-sm-2 mx-2" name="name" type="text" placeholder="Search Medicine" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
        <!-- user -->
        <!-- get session user and role -->
        @if(Auth::check())
            <div class="d-flex flex-row align-items-center justify-content-end">
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle"></i> <span class="mx-2">{{ Auth::user()->name }}</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ route('profile') }}">Profil</a></li>
                        @if (Auth::user()->role == 'admin')
                        <li><a class="dropdown-item" href="{{ route('orders') }}">Pesanan</a></li>
                        @else
                        <li><a class="dropdown-item" href="{{ route('myorder') }}">Keranjang</a></li>
                        @endif
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>
        @else
            <div class="d-flex flex-row align-items-center justify-content-end">
                <div class="dropdown">
                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle"></i> <span class="mx-2">Login</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                    </ul>
                </div>
            </div>
        @endif
    </div>
</nav>
<nav class="navbar my-4 d-lg-none d-block d-flex">
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <a href="{{ route('landing') }}" style="text-decoration: none;" class="d-flex flex-row align-items-center justify-content-center">
            <img class="mx-2" src="{{url('images/logo.png')}}" height="50px">
            <div class="fs-4 fw-bold">Hello Medicine</div>
            @if(Auth::check())
            @if (Auth::user()->role == 'admin')
                <div class="mx-1 text-danger fw-bold mb-1">Admin</div>
            @endif
            @endif
        </a>
        <ul class="nav justify-content-center fs-6">
            <li class="nav-item mx-2">
                <!-- give active link to the current page -->
                <a class="nav-link {{ Request::url() == ('http://localhost:8000/landing') ? 'active' : 'text-dark' }}" href="{{ route('landing') }}">Home</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link {{ Request::url() == ('http://localhost:8000/medicine') || Request::route()->uri == 'medicine/show/{id}' || Request::route()->uri == 'medicine/search' ? 'active' : 'text-dark' }}" href="{{ route('medicine') }}">Medicine</a>
            </li>
            @if(Auth::check())
            @if (Auth::user()->role == 'admin')
            <li class="nav-item mx-2">
                <a class="nav-link position-relative {{ Request::url() == ('http://localhost:8000/orders') ? 'active' : 'text-dark' }}" href="{{ route('orders') }}">Pesanan
                    <span class="position-absolute top-20 start-100 translate-middle badge rounded-pill bg-danger">
                    @php
                        $order = App\Http\Controllers\OrderController::getOrderCount();
                    @endphp
                        {{ $order }}
                        <span class="visually-hidden">New Order</span>
                    </span>
                </a>
            </li>
            @else
            <li class="nav-item mx-2">
                <a class="nav-link position-relative {{ Request::url() == ('http://localhost:8000/myorder') ? 'active' : 'text-dark' }}" href="{{ route('myorder') }}">Keranjang
                    <span class="position-absolute top-20 start-100 translate-middle badge rounded-pill bg-danger">
                    @php
                        $order = App\Http\Controllers\OrderController::getUserOrderCount();
                    @endphp
                        {{ $order }}
                        <span class="visually-hidden">New Order</span>
                    </span>
                </a>
            </li>
            @endif
            @endif
        </ul>
        <!-- search form -->
        <form action="{{ route('medicine.search') }}" method="POST" class="form-inline d-flex my-2 my-lg-0">
            @csrf
            <div class="input-group input-group-sm mb-3">
                <input class="form-control mr-sm-2 mx-2" name="name" type="text" placeholder="Search Medicine" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </div>
        </form>
        <!-- user -->
        <!-- get session user and role -->
        @if(Auth::check())
            <div class="d-flex flex-row align-items-center justify-content-end">
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle"></i> <span class="mx-2">{{ Auth::user()->name }}</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ route('profile') }}">Profil</a></li>
                        @if (Auth::user()->role == 'admin')
                        <li><a class="dropdown-item" href="{{ route('orders') }}">Pesanan</a></li>
                        @else
                        <li><a class="dropdown-item" href="{{ route('myorder') }}">Keranjang</a></li>
                        @endif
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>
        @else
            <div class="d-flex flex-row align-items-center justify-content-end">
                <div class="dropdown">
                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle"></i> <span class="mx-2">Login</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                    </ul>
                </div>
            </div>
        @endif
    </div>
</nav>