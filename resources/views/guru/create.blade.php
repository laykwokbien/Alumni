@extends('template.dashboard')

@section('dashboard')
    <div class="container w-25 vh-100 d-flex flex-column justify-content-center">
        <div class="position-absolute messages d-flex flex-column w-100 align-items-center pe-none mt-3">
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
        <form class="middleware d-flex flex-column justify-content-center gap-3 h-100" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Username:</label>
                <input type="text" class="form-control" name="name" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" id="password" autocomplete="off">
                <input class="form-check-input" type="checkbox" name="check" id="check">
                <label for="check" class="form-check-label">Show Password</label>
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Buat Akun Guru</button>
        </form>
    </div>
@endsection
