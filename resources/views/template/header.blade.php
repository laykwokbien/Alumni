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
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
</head>

<body>
    <header
        class="@if ($page['halaman'] == 'home' || $page['halaman'] == 'alumni' || $page['halaman'] == 'about') {{ 'position-fixed transparent' }} @endif position-relative container-fluid">
        <nav class="navbar navbar-expand-md container d-flex flex-row justify-content-between align-items-center">
            <a href="/" class="navbar-brand nav-logo d-flex align-items-center">
                <img height="70px" src="{{ asset('assets/images/smkn1bws.png') }}" draggable="false">
            </a>
            <div class="burger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <div class="navbar-nav gap-3" id="Nav-Bar">
                <div class="nav-item">
                    <a href="{{ url('/') }}"
                        class="nav-link @if ($page['halaman'] == 'home') {{ 'text-primary' }} @endif">Home</a>
                </div>
                @if (Auth::guard('web')->check() ||
                        Auth::guard('guru')->check() ||
                        Auth::guard('admin')->check() ||
                        Auth::guard('alumni')->check())
                    <div class="nav-item">
                        <a href="{{ url('/alumni') }}"
                            class="nav-link @if ($page['halaman'] == 'alumni') {{ 'text-primary' }} @endif">Alumni</a>
                    </div>
                @endif
                <div class="nav-item">
                    <a href="{{ url('/berita') }}"
                        class="nav-link @if ($page['halaman'] == 'berita') {{ 'text-primary' }} @endif">Berita</a>
                </div>
                <div class="nav-item">
                    <a href="{{ url('/about') }}"
                        class="nav-link @if ($page['halaman'] == 'about') {{ 'text-primary' }} @endif">Tentang</a>
                </div>
                @if (Auth::guard('web')->check() ||
                        Auth::guard('guru')->check() ||
                        Auth::guard('admin')->check() ||
                        Auth::guard('alumni')->check())
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
                            @if (Auth::guard('alumni')->check())
                                Welcome back, {{ Auth::guard('alumni')->user()->username }}
                            @endif
                        </a>
                        <ul class="dropdown-menu">
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
                            <li>
                                <a class="dropdown-item" href="{{ url('/create/jurusan') }}">Jurusan</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/view/alumni') }}">Data Alumni</a>
                            </li>
                            @if (Auth::guard('admin')->check())
                                <li>
                                    <a class="dropdown-item" href="{{ url('/admin/view/user') }}">Check User</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('/admin/view/alumni') }}">Check Alumni</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('/admin/view/guru') }}">Check guru</a>
                                </li>
                            @endif
                        </ul>
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
