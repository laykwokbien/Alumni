@extends('template.master')

@section('dashboard')
    @if ($page['halaman'] == false)
        <div class="position-absolute messages d-flex flex-column w-100 align-items-center pe-none mt-3" style="z-index: 1;">
            @if (session()->has('messages'))
                <div class="alert alert-danger pe-none">
                    {{ session('messages') }}
                </div>
            @endif
        </div>
        <div class="position-absolute d-flex w-100 justify-content-center align-items-center bg-white" style="height: 80%">
            <form method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nisntemp" class="form-label">NISN:</label>
                    <input type="text" name="nisntemp" class="form-control" id="nisntemp" autocomplete="off">
                </div>
                <button class="btn btn-primary" type="submit">Kirim</button>
            </form>
        </div>
    @endif
    @if ($page['halaman'])
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
        <div class="d-flex flex-column middlewarewidth align-items-center mt-5 justify-content-center" style="height: 80vh">
            <form action="" method="post" class="d-flex flex-column">
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
                    <label for="nisn">NISN</label>
                    <select name="nisn" id="nisn" class="form-control nisn">
                        @if ($data['id'] != '' && $data['nisn'] != '')
                            <option selected value="{{ $data['id'] }}">{{ $data['nisn'] }}</option>
                        @endif
                    </select>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" autocomplete="off">
                    <input class="form-check-input" type="checkbox" name="check" id="check">
                    <label for="check" class="form-check-label">Show Password</label>
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Register</button>
            </form>
        </div>
        <a class="btn" href="{{ url('/return') }}">Kembali</a>
    @endif
@endsection
