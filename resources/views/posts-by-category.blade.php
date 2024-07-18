@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mt-3">
                    <div class="row">
                        @foreach($category->posts as $post)
                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                               href="">{{ $category->name }}</a>
                                            <b><small>{{ \Carbon\Carbon::parse($post->published_at)->format('d/m/Y') }}</small></b>
                                        </div>
                                        <a class="h5 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                           href="{{ route('post-detail', $post->id) }}">
                                            {{ Str::limit($post->title, 50) }}
                                        </a>
                                        <img class="img-fluid w-100" src="{{ $post->image }}"
                                             style="object-fit: cover;">
                                        <p class="m-0">
                                            {{ Str::limit($post->excerpt, 59) }}
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            {{-- <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt=""> --}}
                                            <small>{{ $post->user->name }}</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i class="far fa-eye mr-2"></i>{{ $post->views }}</small>
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
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

    @include('layouts.partials.featured-news')

@endsection