@extends('template.master')

@section('dashboard')
    <div class="container d-flex flex-column">
        <div class="row mb-5 mt-5">
            <div class="col-3">
                <h1>Nama:</h1>
                <h2>{{ $id->nama }}</h2>
            </div>
            <div class="col-9">
                <img src="{{ asset('storage/' . $id->foto) }}">
            </div>
        </div>
        <div class="row">
            <h1>Information:</h1>
            <p>Jurusan: {{ $id->isjurusan->nama }}</p>
            <p>NISN: {{ $id->nisn }}</p>
            <p>Tanggal Lahir: {{ $id->ttl }}</p>
            <p>No. Telp: {{ $id->tlp }}</p>
            @if ($id->instagram != '')
                <p>Instagram: {{ $id->instagram }}</p>
            @endif
            @if ($id->facebook != '')
                <p>Facebook: {{ $id->facebook }}</p>
            @endif
            @if ($id->twitter != '')
                <p>Twitter: {{ $id->twitter }}</p>
            @endif
            <p>Tahun Lulus: {{ $id->tahun_lulus }}</p>
            <p>Setelah Lulus: {{ $id->setelah_lulus }}</p>
        </div>
    </div>
@endsection
