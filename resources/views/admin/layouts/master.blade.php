<!doctype html>
<html lang="en">
<head>
    @include('admin.layouts.partials.css')
</head>
    <body>
        <div id="wrapper">
            @include('admin.layouts.partials.navbar-nav')
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    @include('admin.layouts.partials.navbar-top')

                    @yield('content')
                </div>

                <footer class="sticky-footer bg-white">
                    @include('admin.layouts.partials.footer')
                </footer>
            </div>
        </div>
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    </body>
        @yield('scripts')


</html>
