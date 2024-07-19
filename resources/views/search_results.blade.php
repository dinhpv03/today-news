@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mt-3">
                    <div class="section-title">
                        <h4 class="m-0 text-uppercase font-weight-bold">{{ $searchQuery }}</h4>
                    </div>
                    <div class="row">
                        @forelse($results as $post)
                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <div class="bg-white border border-top-0 p-4" style="height: 400px;"> <!-- Cố định chiều cao -->
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">{{ $post->category->name }}</a>
                                            <b><small>{{ \Carbon\Carbon::parse($post->published_at)->format('d/m/Y') }}</small></b>
                                        </div>
                                        <a class="h5 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{ route('post-detail', $post->id) }}" style="height: 50px; overflow: hidden;"> <!-- Cố định chiều cao cho tiêu đề -->
                                            {{ Str::limit($post->title, 50) }}
                                        </a>
                                        <div style="height: 200px; overflow: hidden;">
                                            <img class="img-fluid w-100" src="{{ Storage::url($post->image) }}" style="object-fit: cover; height: 100%;">
                                        </div>
                                        <p class="m-0" style="height: 60px; overflow: hidden;">
                                            {{ Str::limit($post->excerpt, 100) }}
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            <small>{{ Str::limit($post->user->name, 15) }}</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i class="far fa-eye mr-2"></i>{{ $post->views }}</small>
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p>Không tìm thấy kết quả nào cho "{{ $searchQuery }}"</p>
                            </div>
                        @endforelse
                    </div>
                    {{ $results->links() }}
                </div>
                <div class="col-lg-4">
                    @include('layouts.partials.aside')
                </div>
            </div>
        </div>
    </div>
    @include('layouts.partials.featured-news')
@endsection
