@extends('layouts.app')
@section('content')
<div class="tile">
    <h4 class="tile-title">Create Tag</h4>
    <form action="{{route('admin.tags.store')}}" method="POST">
        @include('admin.tag.form')
        <div class="tile-footer">
            <button class="btn btn-primary mr-1" type="submit">
                <i class="fa fa-fw fa-lg fa-check-circle"></i>
                Create
            </button>
            <a class="btn btn-secondary" href="{{ route('admin.tags.index') }}">
                <i class="fa fa-fw fa-lg fa-times-circle"></i>
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
