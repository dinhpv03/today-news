<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
        <a href="#" class="navbar-brand d-block d-lg-none">
            <h6 class="m-0 display-4 text-uppercase text-primary">Biz<span class="text-white font-weight-normal">News</span></h6>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="{{ route('home') }}" class="nav-item nav-link active">trang chủ</a>
                <a href="{{ route('categories') }}" class="nav-item nav-link">danh mục</a>
                @foreach($dataMenu as $item)
                    <a href="{{ route('category.posts', $item->id) }}" class="nav-item nav-link">{{ $item->name }}</a>
                @endforeach
            </div>
        </div>
    </nav>
</div>
