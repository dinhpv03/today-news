@extends('admin.layouts.master')

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header"><strong>Danh mục</strong><small> Sửa</small></div>
            <div class="card-body card-block">
                <form action="{{ route('admin.categories.update', $model) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="form-control-label">Tên danh mục</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $model->name }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="image" class="form-control-label">Hình ảnh</label>
                        <img class="m-3" src="{{ \Storage::url($model->image) }}" width="100px">

                        <input type="file" id="image" name="image" class="form-control" value="{{ $model->image }}">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-info">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
