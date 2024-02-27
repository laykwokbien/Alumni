@extends('template.master')

@section('dashboard')
    <div class="d-flex justify-content-center">
        <table class="table w-75">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Updated</th>
            </thead>
            <tbody>
                @foreach ($page['data'] as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        @if ($page['data'] != 'viewalumni')
                            <td>{{ $row->name }}</td>
                        @else
                            <td>{{ $row->username }}</td>
                        @endif
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
