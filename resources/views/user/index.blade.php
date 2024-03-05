@extends('template.dashboard')

@section('dashboard')
    <div class="position-absolute messages d-flex flex-column w-100 align-items-center">
        @if (session()->has('success'))
            <div class="alert alert-success pe-none">
                {{ session('success') }}
            </div>
        @endif
        @if ($page['delete'])
            <form class="d-flex flex-column delete p-4" method="POST">
                @csrf
                <div class="mb-3">Are you wanna delete this record?</div>
                <div class="selectionbtn d-flex justify-content-around">
                    <button class="btn btn-danger" type="submit">Yes</button>
                    <a href="{{ url('/admin/view/guru') }}" class="btn btn-primary">No</a>
                </div>
            </form>
        @endif
    </div>
    <div class="d-flex flex-column container mt-5">
        @if (Auth::guard('admin')->check() && $page['halaman'] == 'superadmin')
            <a href="{{ url('/create/guru') }}" class="btn btn-primary" style="width: 10rem">Create Guru</a>
        @endif
        <table class="table w-100">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                @if ($page['halaman'] == 'superadmin' && Auth::guard('admin')->user()->isSuperadmin)
                    <th>Aksi</th>
                @endif
            </thead>
            <tbody>
                @foreach ($page['data'] as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        @if ($page['halaman'] == 'viewalumni')
                            <td>{{ $row->isData->nisn }}</td>
                            <td>{{ $row->username }}</td>
                        @endif
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        @if ($page['halaman'] == 'superadmin' && Auth::guard('admin')->user()->isSuperadmin)
                            <td class="d-flex">
                                <a href="{{ url("delete/guru/$row->id") }}" class="btn btn-danger">Delete</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
