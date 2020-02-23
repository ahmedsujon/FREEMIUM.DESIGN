@extends('layouts.app')

@section('content')
<div class="tile">
    <div class="tile-title-w-btn">
        <h4 class="title">Category List</h4>
        <p><a class="btn btn-primary icon-btn" href="{{ route('admin.category.create') }}"><i class="fa fa-plus"></i>Add
                Category
            </a></p>
    </div>
    <div class="tile-body">
        <table class="table table-hover table-bordered data-table">
            <thead>
                <tr>
                    <th class="d-none">{{ _('#') }}</th>
                    <th>{{ _('Category Name') }}</th>
                    <th>{{ _('Status') }}</th>
                    <th>{{ _('Created At') }}</th>
                    <th>{{ _('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index => $category)
                <tr>
                    <td class="d-none">{{ $index }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        @if($category->status == 1)
                        {{ _('Active') }}
                        @elseif($category->status == 0)
                        {{ _('Inactive') }}
                        @else
                        {{ _('Unknown') }}
                        @endif
                    </td>
                    <td>{{date('d M, Y', strtotime($category->created_at))}}</td>
                    <td>
                        <a href="{{ route('admin.category.edit', $category->id) }}"
                            class="btn btn-primary btn-sm mr-3">Edit</a>
                        <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST"
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
