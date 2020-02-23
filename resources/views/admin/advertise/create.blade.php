@extends('layouts.app')
@section('content')
<div class="tile">
    <h4 class="tile-title">Create Advertise</h4>
    <form action="{{route('admin.advertise.store')}}" method="POST" enctype="multipart/form-data">
        @include('admin.advertise.form')
        <div class="tile-footer">
            <button class="btn btn-primary mr-1" type="submit">
                <i class="fa fa-fw fa-lg fa-check-circle"></i>
                Create
            </button>
            <a class="btn btn-secondary" href="{{ route('admin.advertise.index') }}">
                <i class="fa fa-fw fa-lg fa-times-circle"></i>
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
