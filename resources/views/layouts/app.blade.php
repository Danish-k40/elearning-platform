@include('layouts.inc.head')

<body>
    @include('layouts.inc.header')
    @yield('content')
@include('layouts.alert')
@include('layouts.inc.footer')
