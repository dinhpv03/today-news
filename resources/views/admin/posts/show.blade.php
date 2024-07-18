@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Chi tiết bài viết</h6>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Quay lại
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h2 class="mb-4">{{ $post->title }}</h2>
                                <p class="text-muted">
                                    <i class="fas fa-user"></i> {{ $post->user->name ?? 'N/A' }} |
                                    <i class="fas fa-calendar"></i> {{ $post->published_at }} |
                                    <i class="fas fa-eye"></i> {{ $post->views }} lượt xem
                                </p>
                                <div class="mb-4">
                                    <strong>Tóm tắt:</strong>
                                    <p>{{ $post->excerpt }}</p>
                                </div>
                                <div class="mb-4">
                                    <strong>Nội dung:</strong>
                                    <div class="mt-2 content">
                                        {!! $post->content !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Thông tin bài viết</h5>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                ID
                                                <span class="badge bg-primary rounded-pill">{{ $post->id }}</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Slug
                                                <span class="text-muted">{{ $post->slug }}</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Danh mục
                                                <span class="badge bg-info rounded-pill">{{ $post->category->name ?? 'Uncategorized' }}</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Trạng thái
                                                <span class="badge {{ $post->is_active ? 'bg-success' : 'bg-danger' }} rounded-pill">
                                                {{ $post->is_active ? 'Đã xuất bản' : 'Bản nháp' }}
                                            </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card">
                                    <img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}">
                                    <div class="card-body">
                                        <h5 class="card-title">Ảnh đại diện</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Chỉnh sửa
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure??')" type="submit"
                                ><i class="fas fa-trash"></i> Xóa
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa bài viết "{{ $post->title }}"?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .content img {
            max-width: 100%;
            height: auto;
        }
    </style>
@endpush
