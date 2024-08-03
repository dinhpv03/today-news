@extends('layouts.app')

@section('content')

    @if (session('error'))
        <div class="alert alert-success mt-3">
            {{ session('error') }}
        </div>
    @endif

    @include('layouts.partials.slide-show')

    @include('layouts.partials.featured-news')

    <div class="container-fluid mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h6 class="m-0 text-uppercase font-weight-bold">Bài viết mới nhất</h6>
                                <a class="text-secondary font-weight-medium text-decoration-none"
                                   href="{{ route('all-posts') }}">Xem tất cả</a>
                            </div>
                        </div>
                        @foreach($new_posts as $post)
                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="{{ Storage::url($post->image) }}"
                                         style="object-fit: cover; width: 250px; height: 200px;">
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <a class="text-uppercase text-dark p-2 mr-2"
                                               href="">{{ $post->category->name }}</a>
                                            <a class="text-body"
                                               href=""><small>{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y H:i') }}</small></a>
                                        </div>
                                        <a class="h6 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                           href="{{ route('post-detail', $post->slug) }}">{{ Str::limit($post->title, 55) }}</a>
                                        <p class="m-0">{{ Str::limit($post->excerpt, 60) }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circ    le mr-2"
                                                 src="{{ asset('client/img/user.jpg') }}" width="25" height="25" alt="">
                                            <small>John Doe</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $new_posts->links() }}
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h6 class="m-0 text-uppercase font-weight-bold">Tin tức thế giới</h6>
                        </div>
                        <div class="bg-white border border-top-0 p-3 mb-3">
                            @foreach($world_news as $world)
                                <div class="d-flex align-items-center mb-3" style="height: 110px;">
                                    <img class="img-fluid" src="{{ Storage::url($world->image) }}" alt=""
                                         style="width: 110px; height: 110px; object-fit: cover;">
                                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border-start">
                                        <a class="text-dark fw-bold"
                                           href="{{ route('post-detail', $world->slug) }}">{{ Str::limit($world->title, 55) }}</a>
                                        <div class="mt-1">
                                            <small class="text-muted">{{ \Carbon\Carbon::parse($world->created_at)->format('d/m/Y H:i') }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <a href="{{ route('category.posts', $world_news->first()->category_id) }}" class="text-primary d-flex justify-content-end">Xem thêm</a>
                        </div>
                    </div>
                    @include('layouts.partials.aside')
                </div>
            </div>
        </div>
    </div>

@endsection
