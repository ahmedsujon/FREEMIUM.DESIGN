@extends('layouts.app')

@section('content')
<div class="tile">
    <div class="tile-title-w-btn">
        <h4 class="title">Advertise List</h4>
        <p><a class="btn btn-primary icon-btn" href="{{ route('admin.advertise.create') }}"><i
                    class="fa fa-plus"></i>Add
                Advertise
            </a></p>
    </div>
    <div class="tile-body">
        <table class="table table-hover table-bordered data-table">
            <thead>
                <tr>
                    <th class="d-none">{{ _('#') }}</th>
                    <th>{{ _('Advertise Name') }}</th>
                    <th>{{ _('Image') }}</th>
                    <th>{{ _('Preview Resource') }}</th>
                    <th>{{ _('Created At') }}</th>
                    <th>{{ _('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($advertises as $index => $advertise)
                <tr>
                    <td class="d-none">{{ $index }}</td>
                    <td>{{ $advertise->name }}</td>
                    <td><img style="height:37px; border-radius:20px;" src="/storage/app/public/image/{{$advertise->image}}"></td>
                    <td>{{ $advertise->preview_resource }}</td>
                    <td>{{date('d M, Y', strtotime($advertise->created_at))}}</td>
                    <td>
                        <form action="{{ route('admin.advertise.destroy', $advertise->id) }}" method="POST"
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
