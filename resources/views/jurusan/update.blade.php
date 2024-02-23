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
    </div>
    <div class="container d-flex flex-row justify-content-center align-center">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="foto" class="form-label">Foto:</label>
                <input type="file" name="foto" id="foto" class="form-control" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" name="nama" value="{{ $id['nama'] }}">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
        </form>
    </div>
@endsection
