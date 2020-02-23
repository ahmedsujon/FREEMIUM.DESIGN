@extends('layouts.fontend')
@section('content')
@php
$link = \Illuminate\Support\Facades\URL::current();
@endphp
 <div class="container">
        <div class="add-img">
            <a href="#"><img src="/storage/app/public/image/{{$advertise[0]['image']}}" alt="Advertise" class="img-fluid"></a>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="left-side">
                    <div class="single-page-img">
                        <a href="{{$items->preview_resource}}" target="_blank"><img
                                src="/storage/app/public/image/{{$items->image}}" alt="" class="img-fluid"></a>
                    </div>
                    <ul class="share d-flex   justify-content-between">
                            @include('fontend.share', ['url' => 'http://freemium.design/'])
                        </ul>
                    <div class="single-page-content">
                        <h2 class="section-title text-left">{{$items->title}}</h2>
                        <p>{{$items->description}}</p>
                        <ul class="tags">
                            @foreach(App\Tag::all() as $tag)
                           <a
                                    href="{{route('tag.items',$tag->slug)}}"><button>{{$tag->name}}</button></a>
                            @endforeach
                        </ul>
                        <a href="{{$items->download_resource}}" target="_blank" class="btn theme-btn">Download</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <div class="right-side">
                    <a href="#"><img src="/storage/app/public/image/{{$advertise[1]['image']}}" alt="" class="img-fluid"></a>
                </div>
            </div>
        </div>
    </div>
<section class="featured-area section-padding">
    <div class="container">
        <h2 class="section-title">Similar resources</h2>
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
</section>
@endsection
