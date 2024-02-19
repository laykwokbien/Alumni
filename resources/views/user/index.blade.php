@extends('template.master')

@section('dashboard')
    <table class="table">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Password</th>
            <th>Updated</th>
        </thead>
        <tbody>
            @foreach ($page['data'] as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->password }}</td>
                <td>{{ $row->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection