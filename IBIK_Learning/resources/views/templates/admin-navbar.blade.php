<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"> 
    <div class="container-fluid"> 
        <a class="navbar-brand" href="{{ url('/admin/courses') }}"> 
            Admin Panel - {{ config('app.name', 'Laravel') }} 
        </a> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}"> 
            <span class="navbar-toggler-icon"></span> 
        </button> 
 
        <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
            {{-- Left Side (bisa ditambah menu admin) --}} 
            <ul class="navbar-nav me-auto"> 
                {{-- <li class="nav-item"><a href="{{ route('admin.courses.index') }}" class="nav link">Courses</a></li> --}} 
            </ul> 
 
            {{-- Right Side (User Info & Logout) --}} 
            <ul class="navbar-nav ms-auto"> 
                @auth 
                    <li class="nav-item dropdown"> 
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" 
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                            {{ Auth::user()->name }} 
                        </a> 
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"> 
                            <a class="dropdown-item" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                            </form>
                        </div> 
                    </li> 
                @endauth 
            </ul> 
        </div> 
    </div> 
</nav>