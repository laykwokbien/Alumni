<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <header class="container-fluid">
        <nav class="navbar navbar-expand-md container d-flex flex-row justify-content-between align-items-center">
            <a href="/" class="navbar-brand nav-logo"><img height="70px"
                    src="{{ asset('assets/images/smkn1bws.png') }}"></a>
            <div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <div class="navbar-nav">
                        <div class="nav-item">
                            <a href="/"
                                class="nav-link @if ($page['halaman'] == 'home') {{ 'text-primary' }} @endif">Home</a>
                        </div>
                        <div class="nav-item">
                            <a href="#"
                                class="nav-link @if ($page['halaman'] == 'alumni') {{ 'text-primary' }} @endif">Alumni</a>
                        </div>
                        <div class="nav-item">
                            <a href="#"
                                class="nav-link @if ($page['halaman'] == 'about') {{ 'text-primary' }} @endif">Tentang
                                Kita</a>
                        </div>
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Action
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('/create/jurusan') }}">Jurusan</a></li>
                                <li><a class="dropdown-item" href="{{ url('/view/alumni') }}">Data Alumni</a></li>
                            </ul>
                        </div>
                        @if (Auth::guard('web')->check() || Auth::guard('guru')->check() || Auth::guard('admin')->check())
                            <div class="nav-item dropdown">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarNavLightDropdown" aria-controls="navbarNavLightDropdown"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavLightDropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown"aria-expanded="false">
                                        @if (Auth::guard('web')->check())
                                            Welcome back, {{ Auth::guard('web')->user()->name }}
                                        @endif
                                        @if (Auth::guard('guru')->check())
                                            Welcome back, {{ Auth::guard('guru')->user()->name }}
                                        @endif
                                        @if (Auth::guard('admin')->check())
                                            Welcome back, {{ Auth::guard('admin')->user()->name }}
                                        @endif
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="d-flex text-center w-100">
                                                <a class="dropdown-item w-100" href="">
                                                    <i class="bi bi-gear-fill"></i>
                                                    Setting
                                                </a>
                                            </div>
                                        </li>
                                        <li>

                                            <a class="dropdown-item" href="{{ url('/logout') }}">
                                                <i class="bi bi-box-arrow-right"></i>
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <a href="/login" class="btn btn-primary">Login</a>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="position-absolute messages d-flex flex-column w-100 align-items-center pe-none">
        @if (session()->has('success'))
            <div class="alert alert-success pe-none">
                {{ session('success') }}
            </div>
        @endif
    </div>
