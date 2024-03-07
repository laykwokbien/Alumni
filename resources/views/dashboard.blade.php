@extends('template.dashboard')

@section('dashboard')
    <div class="container mt-5 h-100">
        <div class="row gap-3 d-flex justify-content-center">
            <div class="card text-bg-info mb-3 col-md-5 col-lg-3">
                <div class="card-header">Data Alumni</div>
                <div class="card-body">
                    <h5 class="card-title">Total: {{ count($data['alumni']) }}</h5>
                    <p class="card-text">
                        Terdapat {{ count($data['alumni']) }} data alumni yang telah dikirim pada Website Alumni
                        @if (Auth::guard('admin')->check() || Auth::guard('guru')->check())
                            <br>
                            <a class="btn btn-primary" href="{{ url('view/alumni') }}">Tambah</a>
                        @endif
                    </p>
                </div>
            </div>
            <div class="card text-bg-info mb-3 col-md-5 col-lg-3">
                <div class="card-header">Berita</div>
                <div class="card-body">
                    <h5 class="card-title">Total: {{ count($data['berita']) }}</h5>
                    <p class="card-text">
                        Terdapat {{ count($data['berita']) }} Berita yang tersedia pada Website Alumni
                        @if (Auth::guard('admin')->check() || Auth::guard('guru')->check())
                            <br>
                            <a class="btn btn-primary" href="{{ url('view/alumni') }}">Tambah</a>
                        @endif
                    </p>
                </div>
            </div>
            <div class="card text-bg-info mb-3 col-md-5 col-lg-3">
                <div class="card-header">User</div>
                <div class="card-body">
                    <h5 class="card-title">Total: {{ count($data['user']) }}</h5>
                    <p class="card-text">
                        Terdapat {{ count($data['user']) }} user yang berada pada Website Alumni
                    </p>
                </div>
            </div>
            <div class="card text-bg-info mb-3 col-md-5 col-lg-3">
                <div class="card-header">Guru</div>
                <div class="card-body">
                    <h5 class="card-title">Total: {{ count($data['teacher']) }}</h5>
                    <p class="card-text">
                        Terdapat {{ count($data['teacher']) }} guru yang terdaftar pada Website Alumni
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
