@extends('layouts.app')

@section('content')
<div class="tile">
    <div class="tile-title-w-btn">
        <h4 class="title">Subscriber List</h4>
    </div>
    <div class="tile-body">
        <table class="table table-hover table-bordered data-table">
            <thead>
                <tr>
                    <th class="d-none">{{ _('#') }}</th>
                    <th>{{ _('E-mail') }}</th>
                    <th>{{ _('Subscribe Time') }}</th>
                    <th>{{ _('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subscribers as $index => $subscribe)
                <tr>
                    <td class="d-none">{{ $index }}</td>
                    <td>{{ $subscribe->email }}</td>
                    <td>{{date('d M, Y', strtotime($subscribe->created_at))}}</td>
                    <td>
                        <form action="{{ route('admin.subscriber.destroy', $subscribe->id) }}" method="POST"
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
