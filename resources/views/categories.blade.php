@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        @foreach($categories as $item)
                            <div class="col">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ Storage::url($item->image) }}" class="img-fluid rounded-start h-100 object-fit-cover" alt="{{ $item->name }}">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body d-flex flex-column h-100">
                                                <div class="mb-2">
                                                    <small class="text-muted ms-2">{{ $item->created_at->format('M d, Y') }}</small>
                                                </div>
                                                <h5 class="card-title text-uppercase fw-bold">
                                                    <a href="{{ route('category.posts', $item->id) }}" class="text-decoration-none text-secondary">{{ $item->name }}</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('layouts.partials.aside')
                </div>
            </div>
        </div>
    </div>
@endsection
