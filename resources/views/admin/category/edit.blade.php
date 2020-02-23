@extends('layouts.app')
@section('content')
<div class="tile">
    <h4 class="tile-title p-3">Edit Manufacturer</h4>
    <form action="{{ url('admin/category/'.$item->id) }}" method="POST" enctype="multipart/form-data">
        @include('admin.category.form')
        @method('PATCH')
        <div class="tile-footer">
            <button class="btn btn-primary mr-1" type="submit">
                <i class="fa fa-plus" aria-hidden="true"></i>{{ __('Update Category') }}
            </button>
            <a class="btn btn-secondary" href="{{ route('admin.category.index') }}">
                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
            </a>
        </div>
    </form>
</div>
@endsection
