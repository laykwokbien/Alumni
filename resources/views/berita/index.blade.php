@extends('template.master')

@section('dashboard')
    <div class="container mt-5">
        @if (Auth::guard('admin')->check() || Auth::guard('guru')->check())
            <a href="{{ url('/create/berita') }}" class="btn btn-primary  mb-5">Create</a>
        @endif
        @foreach ($page['data'] as $item)
            <div class="beritas d-flex flex-row gap-3 mb-3">
                <img src="{{ asset("./storage/$item->foto") }}" alt="">
                <div class="berita-content d-flex flex-column">
                    <p>{{ $item->judul }}</p>
                    @php echo $item->desc; @endphp
                    <a href="{{ url("/berita/view/$item->id") }}">Selengkapnya <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
