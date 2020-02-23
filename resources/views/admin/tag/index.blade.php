@extends('layouts.app')

@section('content')
<div class="tile">
    <div class="tile-title-w-btn">
        <h4 class="title">Tag List</h4>
        <p><a class="btn btn-primary icon-btn" href="{{ route('admin.tags.create') }}"><i class="fa fa-plus"></i>Add
                Tag
            </a></p>
    </div>
    <div class="tile-body">
        <table class="table table-hover table-bordered data-table">
            <thead>
                <tr>
                    <th class="d-none">{{ _('#') }}</th>
                    <th>{{ _('Tag Name') }}</th>
                    <th>{{ _('Status') }}</th>
                    <th>{{ _('Created At') }}</th>
                    <th>{{ _('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $index => $tag)
                <tr>
                    <td class="d-none">{{ $index }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>
                        @if($tag->status == 1)
                        {{ _('Active') }}
                        @elseif($tag->status == 0)
                        {{ _('Inactive') }}
                        @else
                        {{ _('Unknown') }}
                        @endif
                    </td>
                    <td>{{date('d M, Y', strtotime($tag->created_at))}}</td>
                    <td>
                        <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-primary btn-sm mr-3">Edit</a>
                        <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST"
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
