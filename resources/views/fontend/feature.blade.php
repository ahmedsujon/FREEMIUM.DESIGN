<!-- featured area -->
    <div class="container">
        <h2 class="section-title">Featured Resources</h2>
        <div class="row featured">
            @foreach($randomitems as $randomitem)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="featured-item">
                    <div class="featured-img">
                        <a href="{{route('item.details', $randomitem->slug)}}"><img
                                src="/storage/app/public/image/{{$randomitem->image}}" alt="Image" class="img-fluid"></a>
                    </div>
                    <a href="{{route('item.details', $randomitem->slug)}}">{{$randomitem->title}}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
<!-- end of featured area -->
<div>
    <div class="container">
        <div class="border-top"></div>
    </div>
</div>
