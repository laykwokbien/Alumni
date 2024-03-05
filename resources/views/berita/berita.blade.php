@extends('template.master')

@section('dashboard')
    <div class="container mt-5">
        <a href="{{ url()->previous() }}" class="return"><i class="bi bi-arrow-left"></i>Back</a>
        <div class="berita-each d-flex flex-column gap-3 mt-5">
            <img src="{{ asset("./storage/$id->foto") }}" alt="">
            <div class="berita-content d-flex flex-column">
                <p>{{ $id->judul }}</p>
                @php echo $id->desc; @endphp
            </div>
        </div>
    </div>
@endsection
