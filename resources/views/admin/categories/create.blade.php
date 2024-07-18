@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thêm danh mục mới</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Tên danh mục:</label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Hình ảnh:</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Hủy</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
