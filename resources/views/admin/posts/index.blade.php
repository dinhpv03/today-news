@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Danh sách bài viết</h1>
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Quản lý bài viết</h6>
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Thêm mới</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Image</th>
                            <th>Tóm tắt</th>
                            <th>Ngày đăng</th>
                            <th>Tác giả</th>
                            <th>Danh mục</th>
                            <th>Lượt xem</th>
                            <th>Trạng thái</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><b>{{ $item->title }}</b></td>
                                <td>
                                    <img src="{{ Storage::url($item->image) }}" width="100" class="img-thumbnail">
                                </td>
                                <td>{{ Str::limit($item->excerpt, 255) }}</td>
                                <td>{{ $item->published_at}}</td>
                                <td>{{ $item->user->name ?? 'N/A' }}</td>
                                <td>{{ $item->category->name ?? 'Uncategorized' }}</td>
                                <td>{{ $item->views }}</td>
                                <td>
                                    <span class="badge {{ $item->is_active ? 'bg-success' : 'bg-danger' }}">
                                        {{ $item->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.posts.edit', $item) }}" class="btn btn-primary btn-sm">Sửa</a>
                                        <a href="{{ route('admin.posts.show', $item) }}" class="btn btn-info btn-sm">Xem</a>
                                        <form action="{{ route('admin.posts.destroy', $item) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure??')" type="submit"
                                                    ><i class="fa fa-delete-left"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
