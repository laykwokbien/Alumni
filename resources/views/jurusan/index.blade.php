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
        @if (Auth::guard('admin')->check() || Auth::guard('guru')->check())
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto:</label>
                    <input type="file" name="foto" id="foto" class="form-control" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama: </label>
                    <input type="text" class="form-control" name="nama" autocomplete="off">
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Kirim</button>
            </form>
        @endif
        <table class="table">
            <thead>
                <th>#</th>
                <th>Nama</th>
                <th>Digunakan</th>
                @if (Auth::guard('admin')->check() || Auth::guard('guru')->check())
                    <th>Updated</th>
                    <th>Aksi</th>
                @endif
            </thead>
            <tbody>
                @foreach ($page['data'] as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row['nama'] }}</td>
                        <td>{{ count($row->alumnis) }}</td>
                        <td>{{ $row['updated_at'] }}</td>
                        @if (Auth::guard('guru')->check() || Auth::guard('admin')->check())
                            <td>
                                <a href="/update/jurusan/{{ $row->id }}" class="btn btn-primary">Edit</a>
                                @if (Auth::guard('admin')->check())
                                    <a href="/delete/jurusan/{{ $row->id }}" class="btn btn-danger">Delete</a>
                                @endif
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
