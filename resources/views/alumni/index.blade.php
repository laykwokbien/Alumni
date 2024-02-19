@extends('template.master')

@section('dashboard')
    <div class="position-absolute messages d-flex flex-column w-100 align-items-center">
        @if (session()->has('fail'))
            @foreach (session('fail') as $col)
                @foreach ($col as $messages)
                    <div class="alert alert-danger pe-none">
                        {{ $messages }}
                    </div>
                @endforeach
            @endforeach
        @else
            @if (session()->has('success'))
                <div class="alert alert-success pe-none">
                    {{ session('success') }}
                </div>
            @endif
        @endif
        @if (session()->has('messages'))
            <div class="alert alert-danger pe-none">
                {{ session('messages') }}
            </div>
        @endif
        @if ($page['delete'])
            <form class="d-flex flex-column delete p-4" action="">
                <div class="mb-3">Are you wanna delete this record?</div>
                <div class="selectionbtn d-flex justify-content-around">
                    <button class="btn btn-danger" type="submit">Yes</button>
                    <a href="{{ url('/view/alumni') }}" class="btn btn-primary">No</a>
                </div>
            </form>
        @endif
    </div>
    </div>
    <div class="container d-flex flex-column align-items-start gap-3">
        @auth
            <a href="{{ url('/create/alumni') }}" class="btn btn-primary mt-5 mb-3">Create</a>
        @endauth
        <table class="table">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Jurusan</th>
                <th scope="col">No. Telp</th>
                <th scope="col">Updated</th>
                @auth
                    <th scope="col">Aksi</th>
                @endauth
            </thead>
            <tbody>
                @foreach ($page['data'] as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->isjurusan->nama }}</td>
                        <td>{{ $row->tlp }}</td>
                        <td>{{ $row->updated_at }}</td>
                        @auth
                            <td>
                                <a href="/update/alumni/{{ $row->id }}" class="btn btn-warning">Edit</a>
                                <a href="/delete/alumni/{{ $row->id }}" class="btn btn-danger">Delete</a>
                                <a href="/view/alumni/{{ $row->id }}" class="btn btn-primary">More Info</a>
                            </td>
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
