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
    <header
        class="@if ($page['halaman'] == 'home') {{ 'position-fixed' }} @endif position-relative container-fluid @if ($page['halaman'] == 'home') {{ 'transparent' }} @endif">
        <nav class="navbar navbar-expand-md container d-flex flex-row justify-content-between align-items-center">
            <a href="/" class="navbar-brand nav-logo d-flex align-items-center">
                <img height="70px" src="{{ asset('assets/images/smkn1bws.png') }}" draggable="false">
            </a>
            @auth
                <div class="burger">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
                <div class="navbar-nav" id="Nav-Bar">
                    <div class="nav-item">
                        <a href="{{ url('/') }}"
                            class="nav-link @if ($page['halaman'] == 'home') {{ 'text-primary' }} @endif">Home</a>
                    </div>
                    <div class="nav-item">
                        <a href="{{ url('/alumni') }}"
                            class="nav-link @if ($page['halaman'] == 'alumni') {{ 'text-primary' }} @endif">Alumni</a>
                    </div>
                    <div class="nav-item">
                        <a href="{{ url('/about') }}"
                            class="nav-link @if ($page['halaman'] == 'about') {{ 'text-primary' }} @endif">Tentang</a>
                    </div>
                    @if (Auth::guard('web')->check() || Auth::guard('guru')->check() || Auth::guard('admin')->check())
                        <div class="nav-item dropdown @if ($page['halaman'] == 'home') {{ 'transparent' }} @endif">
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
                                <hr>
                                <li>
                                    <p class="text-white text-center mt-3">User</p>
                                </li>
                                <hr>
                                <li>
                                    <div class="d-flex text-center w-100">
                                        <a class="dropdown-item w-100" href="">
                                            <i class="bi bi-gear-fill">
                                                Setting
                                            </i>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="dropdown-item text-center" href="{{ url('/logout') }}">
                                        <i class="bi bi-box-arrow-right">
                                            Logout
                                        </i>
                                    </a>
                                </li>
                                <hr>
                                <li>
                                    <p class="text-white text-center mt-3">Action</p>
                                </li>
                                <hr>
                                <li><a class="dropdown-item" href="{{ url('/create/jurusan') }}">Jurusan</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ url('/view/alumni') }}">Data Alumni</a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="/login" class="btn btn-primary">Login</a>
                    @endif
                </div>
                </div>
                </div>
            @endauth
        </nav>
    </header>
    <div class="position-absolute messages d-flex flex-column w-100 align-items-center pe-none">
        @if (session()->has('success'))
            <div class="alert alert-success pe-none">
                {{ session('success') }}
            </div>
        @endif
    </div>
