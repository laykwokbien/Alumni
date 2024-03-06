<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <title>Document</title>
</head>

<body class="d-flex flex-column flex-md-row justify-content-between">
    <div class="burger bg-burger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
    <div class="sidebar flex-column" id="sidebar">
        <p class="text-center mt-5 w-100">
            @if (Auth::guard('web')->check())
                Welcome back, {{ Auth::guard('web')->user()->name }}
            @endif
            @if (Auth::guard('guru')->check())
                Welcome back, {{ Auth::guard('guru')->user()->name }}
            @endif
            @if (Auth::guard('admin')->check())
                Welcome back, {{ Auth::guard('admin')->user()->name }}
            @endif
            @if (Auth::guard('alumni')->check())
                Welcome back, {{ Auth::guard('alumni')->user()->username }}
            @endif
        </p>
        <nav class="nav-list d-flex flex-column flex-row gap-3 mt-md-5">
            <div class="nav-item">
                <a class="nav-link text-center" href="{{ url('/') }}">
                    Home
                    <i class="bi bi-house-fill"></i>
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-link text-center" href="{{ '/dashboard' }}">
                    Dashboard
                    <i class="bi bi-speedometer"></i>
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-link text-center" href="{{ url('/view/alumni') }}">
                    Alumni
                    <i class="bi bi-person-fill"></i>
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-link text-center" href="{{ url('/create/jurusan') }}">
                    Jurusan
                    <i class="bi bi-wrench"></i>
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-link text-center" href="{{ url('/berita') }}">
                    Berita
                    <i class="bi bi-newspaper"></i>
                </a>
            </div>
            @if (Auth::guard('admin')->check())
                <div class="nav-item dropdown d-flex flex-column w-100">
                    <a class="nav-link dropdown-toggle text-center" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        User
                    </a>
                    <ul class="dropdown-menu w-100" style="margin: 0; border: none; background: transparent;">
                        <li>
                            <a class="dropdown-item text-white text-center " href="{{ url('/admin/view/guru') }}">
                                Guru
                                <i class="bi bi-person-workspace"></i>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-white text-center " href="{{ url('/admin/view/user') }}">
                                User
                                <i class="bi bi-person-lines-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-white text-center " href="{{ url('/admin/view/alumni') }}">
                                Alumni
                                <i class="bi bi-person-lines-fill"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            @endif
        </nav>
    </div>
