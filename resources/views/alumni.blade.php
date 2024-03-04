@extends('template.master')

@section('dashboard')
    <div class="container-fluid" id="alumni">
        <h1 class="h-100 w-100 d-flex justify-content-center align-items-center text-white">Alumni</h1>
    </div>
    <div class="container mt-5 position-relative">
        <form class="d-flex flex-row-reverse position-absolute search">
            @csrf
            <input type="text" name="search">
            <button style="background:transparent; border: none;" type="submit"><i class="bi bi-search"></i></button>
        </form>
    </div>
    <h1 class="text-center mb-3">Alumni</h1>
    <div class="row gap-5 d-flex justify-content-center w-100" style="box-sizing: border-box">
        @foreach ($page['alumni'] as $alumni)
            <div class="col-4 card">
                <img src="{{ asset("/storage/$alumni->foto") }}" alt="">
                <div class="desc">
                    <h2>{{ $alumni->nama }}</h2>
                    <p>{{ $alumni->isjurusan->nama }}</p>
                    <p>Tahun Lulus: <br> {{ $alumni->tahun_lulus }}</p>
                </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection
