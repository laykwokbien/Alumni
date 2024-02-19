@extends('template.master')

@section('dashboard')
    <div class="position-absolute messages d-flex w-100 justify-content-center">
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
            <container class="d-flex flex-column delete p-4">
                @csrf
                <div class="mb-3">Are you wanna delete this record?</div>
                <div class="selectionbtn d-flex justify-content-around">
                    <form method="POST">
                        @csrf
                        <button class="btn btn-danger" type="submit">Yes</button>
                    </form>
                    <a href="{{ url('/create/jurusan') }}" class="btn btn-primary">No</a>
                </div>
            </container>
        @endif
    </div>
    <div class="container d-flex flex-row gap-3 mt-5">
        @auth
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama: </label>
                    <input type="text" class="form-control" name="nama" autocomplete="off">
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Kirim</button>
            </form>
        @endauth
        <table class="table">
            <thead>
                <th>#</th>
                <th>Nama</th>
                <th>Used</th>
                <th>Updated</th>
                @auth
                    <th>Aksi</th>
                @endauth
            </thead>
            <tbody>
                @foreach ($page['data'] as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row['nama'] }}</td>
                        <td>{{ count($row->alumnis) }}</td>
                        <td>{{ $row['updated_at'] }}</td>
                        @auth
                            <td>
                                <a href="/update/jurusan/{{ $row->id }}" class="btn btn-primary">Edit</a>
                                <a href="/delete/jurusan/{{ $row->id }}" class="btn btn-danger">Delete</a>
                            </td>
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
