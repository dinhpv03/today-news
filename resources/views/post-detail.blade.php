@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="position-relative mb-3 mt-3">
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-3">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                   href="">{{ $post->category->name }}</a>
                                <a class="text-body" href="">{{ \Carbon\Carbon::parse($post->published_at)->format('d/m/Y') }}</a>
                            </div>
                            <h3 class="mb-3 text-secondary text-uppercase font-weight-bold">{{ $post->title }}</h3>
                            <p>{{ $post->content }}</p>
                            <img class="img-fluid w-100" src="{{ asset($post->image) }}" style="object-fit: cover;">
                        </div>
                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle mr-2" src="{{ asset('client/img/user.jpg') }}" width="25" height="25" alt="">
                                <span>{{ $post->user->name }}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="ml-3"><i class="far fa-eye mr-2"></i>{{ $post->views }}</span>
                                <span class="ml-3"><i class="far fa-comment mr-2"></i>123</span>
                            </div>
                        </div>
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
