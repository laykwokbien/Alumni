@extends('template.master')

@section('dashboard')
    <div class="container-fluid" id="alumni">
        <h1>Alumni</h1>
    </div>
    <div class="container mt-5">
        <h1 class="text-center mb-3">Alumni</h1>
        <div class="row gap-4">
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
