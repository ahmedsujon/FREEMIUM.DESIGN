@extends('layouts.app')

@section('content')
<div class="tile">
    <div class="tile-title-w-btn">
        <h4 class="title">Submitted Resource List</h4>
    </div>
    <div class="tile-body">
        <table class="table table-hover table-bordered data-table">
            <thead>
                <tr>
                    <th class="d-none">{{ _('#') }}</th>
                    <th>{{ _('Name') }}</th>
                    <th>{{ _('Preview Link') }}</th>
                    <th>{{ _('Link to Sketch') }}</th>
                    <th>{{ _('Website') }}</th>
                    <th>{{ _('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($submits as $index => $submit)
                <tr>
                    <td class="d-none">{{ $index }}</td>
                    <td>{{ $submit->name }}</td>
                    <td>{{ $submit->preview_resource }}</td>
                    <td>{{ $submit->sketch_resource }}</td>
                    <td>{{ $submit->preview_website }}</td>
                    <td>
                        <form action="{{ route('admin.resource_submit.destroy', $submit->id) }}" method="POST"
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
