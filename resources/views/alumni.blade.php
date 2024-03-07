@extends('template.master')

@section('dashboard')
    <div class="container-fluid" id="alumni">
        <h1 class="h-100 w-100 d-flex justify-content-center align-items-center text-white">Alumni</h1>
    </div>
    <div class="container mt-5 position-relative">
        <form class="d-flex flex-row-reverse position-absolute search" data-filter-container="close">
            @csrf
            <input type="text" name="search">
            <button style="background:transparent; border: none;" type="submit"><i class="bi bi-search"></i></button>
        </form>
    </div>
    <h1 class="text-center mb-3">Alumni</h1>
    <div class="row gap-5 d-flex justify-content-center w-100" style="box-sizing: border-box">
        @foreach ($page['alumni'] as $alumni)
            <div class="col-md-5 col-lg-3 alumni card">
                <img src="{{ asset("/storage/$alumni->foto") }}" alt="">
                <div class="desc">
                    <h2>{{ $alumni->nama }}</h2>
                    <p>{{ $alumni->isjurusan->nama }}</p>
                    <p>NISN: <br> {{ $alumni->nisn }}</p>
                    <p>Alamat: <br> {{ $alumni->alamat }}</p>
                    <p>Tahun Lulus: <br> {{ $alumni->tahun_lulus }}</p>
                    <a href="{{ url("view/alumni/$alumni->id") }}" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        @endforeach
    </div>
    @if (count($page['alumni']) == 0)
        <div class="d-flex justify-content-center align-items-center"
            style="height: 50vh; font-weight: 600; font-size: 25px;">
            Data Cannot be Found
        </div>
    @endif
    <div class="d-flex justify-content-center">
        {{ $page['alumni']->links() }}
    </div>
    </div>
@endsection
