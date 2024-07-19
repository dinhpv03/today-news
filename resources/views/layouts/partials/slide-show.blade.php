<div class="container-fluid mt-1">
    <div class="row">
        <div class="col-lg-12 px-0">
            <div class="owl-carousel main-carousel position-relative">
                @foreach($slide_show_posts as $slide_show)
                    <div class="position-relative overflow-hidden" style="height: 500px;">
                        <img class="img-fluid h-100" src="{{ Storage::url($slide_show->image) }}" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                   href="{{ route('category.posts', [$slide_show->category->id]) }}">{{ $slide_show->category->name }}</a>
                                <a class="text-white" href="">{{ \Carbon\Carbon::parse($slide_show->published_at)->format('d/m/Y') }}</a>
                            </div>
                            <a class="h4 m-0 text-white text-uppercase font-weight-bold" href="{{ route('post-detail', $slide_show->id) }}">{{ $slide_show->title }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

