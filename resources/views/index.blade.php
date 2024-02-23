@extends('template.master')

@section('dashboard')
    <div class="container-fluid hero">
        <div class="container-fluid content" id="home">
            <div class="container d-flex flex-column justify-content-center h-75 align-items-center pt-5 gap-5">
                <img src="{{ asset('assets/images/smkn1bws.png') }}" draggable="false">
                <h1 class="text-white">SMK Negeri 1 Bondowoso</h1>
                <p class="text-white">Berbudaya, Berteknologi dan Sesuai Dengan Pancasila</p>
            </div>
        </div>
    </div>
    <div class="container d-flex flex-column justify-content-center align-items-center pt-5 pb-5" id='jurusan'
        id="jurusan">
        <h1 class="text-center mb-5 head-jurusan">Konsentrasi Keahlihan</h1>
        <div class="row gap-5 d-flex justify-content-center">
            @foreach ($page['jurusan'] as $col)
                <div
                    class="jurusan-each col-md-4 col-lg-3 d-flex flex-column justify-content-center align-items-center p-5 mb-5">
                    <img class="object-fit-cover object-fit-scale mb-5" draggable="false" width="200px" height="200px"
                        src="{{ asset("storage/$col->foto") }}" alt="">
                    <h1 class="title-jurusan text-center">{{ $col->nama }}</h1>
                </div>
            @endforeach
        </div>
    </div>
@endsection
