@extends('layouts.fontend')
@section('content')
<div class="container">
    <h2 class="section-title">{{$items->count()}} Results For {{$query}}</h2>
    <div class="row new-releases">
        @if($items->count() > 0)
        @foreach($items as $item)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="featured-item">
                <div class="featured-img">
                    <a href="{{route('item.details', $item->slug)}}"><img src="/storage/app/public/image/{{$item->image}}"
                            alt="Image" class="img-fluid"></a>
                </div>
                <a href="{{route('item.details', $item->slug)}}">Event Landing Page</a>
            </div>
        </div>
        @endforeach
        @else
        <h4 class="section-title">Related Category Item Not Font</h4>
        @endif
    </div>

    <div class="pagination-nav">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link prev-page" href="" tabindex="-1">Prev</a>
                </li>
                <li class="page-item"><a class="page-link" href="">1</a></li>
                <li class="page-item"><a class="page-link active" href="">2</a></li>
                <li class="page-item"><a class="page-link" href="">3</a></li>
                ...
                <li class="page-item"><a class="page-link" href="">300</a></li>
                <li class="page-item">
                    <a class="page-link next-page" href="">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

@include('fontend.submit_resource')
@endsection
