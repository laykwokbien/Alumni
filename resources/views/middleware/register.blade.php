@extends('template.master')

@section('dashboard')
    <div class="position-absolute messages d-flex flex-column w-100 align-items-center pe-none">
        @if (session()->has('fail'))
            @foreach (session('fail') as $col)
                @foreach ($col as $messages)
                    <div class="alert alert-danger pe-none">
                        {{ $messages }}
                    </div>
                @endforeach
            @endforeach
        @endif
    </div>
    <div class="container w-25">
        <form class="d-flex flex-column gap-3 mt-5" method="POST">
            @csrf
            <div class="h3 align-self-center">Register</div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Username:</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" id="password">
                <input class="form-check-input" type="checkbox" name="check" id="check"> <label for="check"
                    class="form-check-label">Show Password</label>
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Register Sekarang</button>
            <hr>
            <p class="align-self-center">Sudah Punya Akun? <a href="/login">Login</a></p>
        </form>
    </div>
@endsection
