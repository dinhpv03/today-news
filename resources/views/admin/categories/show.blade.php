@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Chi tiết danh mục</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="row">
                                <div class="col-xl-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label"><strong>Tên danh mục:</strong></label>
                                        <p><b><i>{{ $data->first()->name }}</i></b></p>
                                    </div>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label"><strong>Hình ảnh:</strong></label>
                                        <div>
                                            <img src="{{ Storage::url($data->first()->image) }}" alt="Category Image" class="img-fluid" style="max-height: 200px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Quay lại</a>
                                    <a href="{{ route('admin.categories.edit', ['category' => $data->first()->id]) }}" class="btn btn-primary">Cập nhật danh mục</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
