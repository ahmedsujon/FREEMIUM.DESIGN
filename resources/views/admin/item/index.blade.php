@extends('layouts.app')

@section('content')
<div class="tile">
    <div class="tile-title-w-btn">
        <h4 class="title">Category List ({{ $items->count() }})</h4>
        <p><a class="btn btn-primary icon-btn" href="{{ route('admin.items.create') }}"><i class="fa fa-plus"></i>Add New
                Item
            </a></p>
    </div>
    <div class="tile-body">
        <table class="table table-hover table-bordered data-table">
            <thead>
                <tr>
                    <th class="d-none">{{ _('#') }}</th>
                    <th>{{ _('Title') }}</th>
                    <th>{{ _('Image') }}</th>
                    <th>{{ _('Preview Resource') }}</th>
                    <th>{{ _('Download Resource') }}</th>
                    <th>{{ _('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $index => $item)
                <tr>
                    <td class="d-none">{{ $index }}</td>
                    <td>{{ $item->title }}</td>
                    <td><img style="height:37px; border-radius:20px;" src="/storage/app/public/image/{{$item->image}}"></td>
                    <td>{{ $item->preview_resource }}</td>
                    <td>{{ $item->download_resource }}</td>
                    <td>
                        <a href="{{ route('admin.items.edit', $item->id) }}"
                            class="btn btn-primary btn-sm mr-3">Edit</a>
                        <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mr-3"
                                onclick="return(confirm('are you sure to delete?'))">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
