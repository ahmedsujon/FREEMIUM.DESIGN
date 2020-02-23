@extends('layouts.app')
@section('content')
<div class="tile">
    <h4 class="tile-title p-3">Edit Manufacturer</h4>
    <form action="{{ url('admin/items/'.$items->id) }}" method="POST">
        @include('admin.item.form')
        @method('PATCH')
        <div class="tile-footer">
            <button class="btn btn-primary mr-1" type="submit">
                <i class="fa fa-plus" aria-hidden="true"></i>{{ __('Update Item') }}
            </button>
            <a class="btn btn-secondary" href="{{ route('admin.items.index') }}">
                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
            </a>
        </div>
    </form>
</div>
@endsection
