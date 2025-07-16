{{-- resources/views/templates/header.blade.php --}}

{{-- Navigasi utama menggunakan Bootstrap 5 --}}
<nav class="navbar navbar-expand-lg" style="background-color: var(--bg-main);"> 
    <div class="container"> 
        <a class="navbar-brand text-light fw-bold" href="/"> 
            IBIK Learning 
        </a> 
 
        <button class="navbar-toggler border-0" type="button" 
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" 
                aria-label="Toggle navigation"> 
            <span class="navbar-toggler-icon"></span> 
        </button> 
 
        <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center"> 
                @php 
                    $navItems = [ 
                        'home' => 'Home', 
                        'product' => 'Product', 
                        'profile' => 'Profile', 
                    ]; 
                @endphp 
 
                @foreach ($navItems as $route => $label) 
                    <li class="nav-item"> 
                        <a class="nav-link {{ request()->is($route) ? 'active-link' : 'text-light' }}" 
                           href="/{{ $route }}"> 
                            {{ $label }} 
                        </a> 
                    </li> 
                @endforeach 
 
                {{-- Auth Menu --}} 
                @guest 
                    @if (Route::has('login')) 
                        <li class="nav-item ms-3"> 
                            <a class="btn btn-outline-light rounded-pill px-3" href="{{ route('login')}}"> 
                                Login 
                            </a> 
                        </li> 
                    @endif 
                @else 
                    <li class="nav-item dropdown ms-3"> 
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" 
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            {{ Auth::user()->name }} 
                        </a> 
                        <ul class="dropdown-menu dropdown-menu-end"> 
                            <li> 
                                <a class="dropdown-item" href="{{ route('logout') }}" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> 
                                    Logout 
                                </a> 
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> 
                                    @csrf 
                                </form> 
                            </li> 
                        </ul> 
                    </li> 
                @endguest 
            </ul> 
        </div> 
    </div> 
</nav> 