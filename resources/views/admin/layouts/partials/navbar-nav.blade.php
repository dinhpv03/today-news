<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Trang chủ</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Category -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOne"
           aria-expanded="false" aria-controls="collapseOne">
            <i class="fas fa-fw fa-cog"></i>
            <span>Danh mục</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.categories.index') }}"><span>Danh sách</span></a>
                <a class="collapse-item" href="{{ route('admin.categories.create') }}">Thêm mới danh mục</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Post -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
           aria-expanded="false" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Bài viết</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.posts.index') }}"><span>Danh sách</span></a>
                <a class="collapse-item" href="{{ route('admin.posts.create') }}">Thêm mới bài viết</a>
            </div>
        </div>
    </li>


</ul>
