<div class="container-fluid d-none d-lg-block">
    <div class="row align-items-center bg-dark px-lg-5">
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-sm bg-dark p-0">
                <ul class="navbar-nav ml-n2">
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#">{{ $currentDate }}</a>
                    </li>
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#">Quảng cáo</a>
                    </li>
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="{{ route('contact') }}">Liên hệ</a>
                    </li>
                    @guest
                        @if (Route::has('login'))

                            <li class="nav-item">
                                <a class="nav-link text-body small" href="{{ route('register') }}">Đăng ký</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-body small" href="{{ route('login') }}">Đăng nhập</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Đăng xuất
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

            </nav>
        </div>
        <div class="col-lg-3 text-right d-none d-md-block">
            <nav class="navbar navbar-expand-sm bg-dark p-0">
                <ul class="navbar-nav ml-auto mr-n2">
                    <li class="nav-item">
                        <a class="nav-link text-body" href="#"><small class="fab fa-twitter"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href="#"><small class="fab fa-facebook-f"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href="#"><small class="fab fa-linkedin-in"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href="#"><small class="fab fa-instagram"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href="#"><small class="fab fa-google-plus-g"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href="#"><small class="fab fa-youtube"></small></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="container-fluid bg-white py-3">
        <div class="row align-items-center justify-content-between px-lg-5">
            <div class="col-lg-4 d-none d-lg-block">
                <a href="{{ route('home') }}" class="navbar-brand p-0">
                    <h5 class="m-0 display-4 text-uppercase">
                        <span class="text-primary font-weight-bold">Today</span>
                        <span class="text-secondary">News</span>
                    </h5>
                </a>
            </div>
            <div class="col-lg-4 text-center py-2">
                <form action="{{ route('search') }}" method="post" class="search-form">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Tìm kiếm..." aria-label="Tìm kiếm">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
