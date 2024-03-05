@extends('template.dashboard')

@section('dashboard')
    <div class="position-absolute messages d-flex w-100 justify-content-center pe-none">
        @if (session()->has('fail'))
            @foreach (session('fail') as $col)
                @foreach ($col as $messages)
                    <div class="alert alert-danger">
                        {{ $messages }}
                    </div>
                @endforeach
            @endforeach
        @endif
    </div>
    <div class="container mt-5">
        @csrf
        <h1 style="border-bottom: 2px solid black;">Buat Post Baru</h1>
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="foto" class="form-label">Foto:</label>
                <input type="file" name="foto" id="foto" class="form-control w-25">
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul: </label>
                <input type="text" name="judul" id="judul" class="form-control w-25" value="{{ $id->judul }}">
            </div>
            <div class="mb-3 w-75">
                <label for="desc">Description</label>
                <input id="desc" type="hidden" name="desc" value="{{ $id->desc }}">
                <trix-editor input="desc"></trix-editor>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Buat Post</button>
        </form>
    </div>
@endsection
