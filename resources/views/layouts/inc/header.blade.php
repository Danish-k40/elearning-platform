<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="index.html">Mentor</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                @if(!Auth::check())
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="">Courses</a></li>
                @else
                    <li><a class="active" href="{{route('dashboard')}}">Home</a></li>
                    <li><a href="{{route('get.course')}}">My Courses</a></li>
                    <li><a onclick="logout()">Logout</a></li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
        <a onclick="openLoginForm()" class="get-started-btn">@if(Auth::check()) {{ Auth::user()->name }} @else Sign In @endif</a>
    </div>
</header><!-- End Header -->