<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="section-title">
            <h6 class="m-0 text-uppercase font-weight-bold">Tin tức nổi bật</h6>
        </div>
        <div class="owl-carousel news-carousel carousel-item-4 position-relative">
            @foreach($topPosts as $post)
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid h-100" src="{{ Storage::url($post->image) }}" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                               href="{{ route('post-detail', $post->slug) }}">{{ $post->category->name }}</a>
                            <a class="text-white" href=""><small>{{ $post->published_at }}</small></a>
                        </div>
                        <a class="m-0 text-white text-uppercase font-weight-semi-bold" href="{{ route('post-detail', $post->slug) }}">{{ Str::limit($post->excerpt, 30) }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
