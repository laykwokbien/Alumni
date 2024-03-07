@extends('template.master')

@section('dashboard')
    <div class="container-fluid hero">
        <div class="container-fluid content" id="home" data-bool="true">
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
        <div class="row gap-5 d-flex justify-content-center @if (count($page['jurusan']) == 0) {{ 'vh-100' }} @endif">
            @foreach ($page['jurusan'] as $col)
                <div
                    class="jurusan-each col-6 col-md-4 col-lg-3 d-flex flex-column justify-content-center align-items-center p-5 mb-5">
                    <img class="object-fit-cover object-fit-scale mb-5" draggable="false" width="200px" height="200px"
                        src="{{ asset("storage/$col->foto") }}" alt="">
                    <p class="title-jurusan text-center">{{ $col->nama }}</p>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container-fluid d-flex justify-content-center" id="Ads">
        <div class="container row h-100 py-5">
            <div class="col-lg-6 d-flex justify-content-center align-items-center">
                <object data="{{ asset('assets/images/graduation_cap.svg') }}"></object>
            </div>
            <div class="col-lg-6 d-flex flex-column align-items-center justify-content-center text-center gap-4">
                <h1>Cari tahu Alumni kami secara mendalam!</h1>
                <p>Cari tahu alumni kami dengan mengklik tombol di bawah ini!</p>
                <a class="btn btn-ads" href="{{ url('/alumni') }}">Click Me!</a>
            </div>
        </div>
    </div>
    <div class="container mt-5" id="berita">
        <h1>Informasi Terbaru <i class="bi bi-newspaper"></i></h1>
        <div
            class="berita-body d-flex @if (count($page['berita']) != 0) {{ 'h-100' }} @endif  d-flex flex-row gap-5 align-item-center flex-nowrap @if (count($page['berita']) == 0) {{ 'vh-100' }} @endif">
            @foreach ($page['berita'] as $item)
                <div class="berita d-flex flex-column gap-2 mb-3">
                    <img src="{{ asset("/storage/$item->foto") }}" alt="news">
                    <h2>{{ $item->judul }}</h2>
                    @php echo $item->desc; @endphp
                    <div class="d-flex justify-content-around align-items-center" style="height: 5rem;">
                        <a class="btn btn-primary w-50" href="{{ url("/berita/view/$item->id") }}">View More</a>
                        <p class="mt-3">{{ $item->created_at }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <a href="{{ url('/about') }}" class="ads-tentang container-fluid d-flex justify-content-center align-items-center">
        <h1>Tentang Sekolah Kami</h1>
    </a>
    <div class="container vh-100 mt-5 vid-prof">
        <div class="d-flex justify-content-center mb-5">
            <h1 class="text-center">Video Profile</h1>
        </div>
        <iframe width="100%" height="80%"
            src="https://www.youtube.com/embed/Wlwo0yxazAg?si=Uh_2QZEWQ_0dLwSb&amp;controls=0" title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
    </div>
@endsection
