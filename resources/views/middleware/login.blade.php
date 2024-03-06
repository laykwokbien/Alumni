@extends('template.master')

@section('dashboard')
    <div class="position-absolute messages d-flex flex-column w-100 align-items-center pe-none mt-3">
        @if (session()->has('messages'))
            <div class="alert alert-danger pe-none">
                {{ session('messages') }}
            </div>
        @endif
    </div>
    <div class="container middlewarewidth h-75">
        <form class="middleware d-flex flex-column gap-3 justify-content-center" method="POST">
            @csrf
            <div class="h3 align-self-center">Login</div>
            <div class="mb-3">
                <label for="name" class="form-label">Username:</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password"id="password">
                <input type="checkbox" name="check" id="check" class="form-check-input"> <label
                    for="check"class="form-check-label">Show Password</label>
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Login Sekarang</button>
            <hr>
            <p class="align-self-center">Masih belum daftar? <a href="/register">Daftar Sekarang</a></p>
            <p class="align-self-center">Apakah Kamu Alumni? <a
                    href="@if (request()->session()->get('alumni') != null) {{ url('/register/alumni') }} @else {{ url('/confirm/alumni') }} @endif">Daftar
                    Disini</a></p>
        </form>
    </div>
@endsection
