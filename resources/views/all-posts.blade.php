@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col-lg-12">
                            <div class="row g-0  border h-100">
                                @foreach($posts as $item)
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <img class="img-fluid w-100" src="{{ Storage::url($item->image) }}" style="object-fit: cover;">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div>
                                        <div class="p-3">
                                            <div class="mb-2">
                                                <a class="p-2 me-2 text-dark" href="{{ route('category.posts', $item->category->id) }}">{{ $item->category->name }}</a>
                                                <a class="text-body" href=""><small>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y i:H') }}</small></a>
                                            </div>
                                            <a class="h6 d-block mb-3 text-secondary text-uppercase fw-bold" href="{{ route('post-detail', $item->slug) }}">
                                                {{ $item->title }}
                                            </a>
                                            <p class="m-0">
                                                {{ $item->excerpt }}
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between border-top p-3">
                                            <div class="d-flex align-items-center">
                                                <img class="rounded-circle me-2" src="{{ asset('client/img/user.jpg') }}" width="25" height="25" alt="">
                                                <small>John Doe</small>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <small class="ms-3"><i class="far fa-eye me-2"></i>{{ $item->views }}</small>
                                                <small class="ms-3"><i class="far fa-comment me-2"></i>12</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
