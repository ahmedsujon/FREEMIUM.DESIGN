<section class="featured-area section-padding">
<div class="container">
    <h2 class="section-title">New Releases</h2>
    <div class="row new-releases">
        @foreach($items as $item)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="featured-item">
                <div class="featured-img">
                    <a href="{{route('item.details', $item->slug)}}"><img src="/storage/app/public/image/{{$item->image}}"
                            alt="Image" class="img-fluid"></a>
                </div>
                <a href="{{route('item.details', $item->slug)}}">{{$item->title}}</a>
            </div>
        </div>
        @endforeach
    </div>
    <div>
</div>
    <div class="show-all-btn text-center">
        <a href="{{ route('all_items') }}" class="btn theme-btn">Show All Resources</a>
    </div>
    
</div>
</section>

