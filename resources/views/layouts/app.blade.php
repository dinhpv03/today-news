<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.head')
</head>
<body>
    @include('layouts.partials.navbar-top')

    @include('layouts.partials.menu')

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include('layouts.partials.footer')

    @include('layouts.partials.js')
</body>
</html>
