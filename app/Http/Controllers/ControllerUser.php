<?php

namespace App\Http\Controllers;

use App\Models\alumni;
use App\Models\jurusan;
use App\Models\Teacher;
use App\Models\User;
use App\Models\useralumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ControllerUser extends Controller
{
    public function index()
    {
        $page = array(
            'halaman' => 'home',
            'jurusan' => jurusan::get(),
        );
        return view('index', compact('page'));
    }
    public function alumni()
    {
        $page = array(
            'halaman' => 'alumni',
            'alumni' => alumni::get(),
        );
        return view('alumni', compact('page'));
    }
    public function about()
    {
        $page = array(
            'halaman' => 'about',
        );
        return view('about', compact('page'));
    }
    public function loginpg()
    {
        $page = array(
            'halaman' => 'login',
        );
        return view('middleware.login', compact('page'));
    }
    public function login()
    {
        if (Auth::guard('web')->attempt(['name' => request()->input('name'), 'password' => request()->input('password')])) {
            request()->session()->regenerate();
            return redirect()->intended('/');
        }
        if (Auth::guard('guru')->attempt(['name' => request()->input('name'), 'password' => request()->input('password')])) {
            request()->session()->regenerate();
            return redirect()->intended('/create/alumni');
        }
        if (Auth::guard('admin')->attempt(['name' => request()->input('name'), 'password' => request()->input('password')])) {
            request()->session()->regenerate();
            return redirect()->intended('/admin/view/user');
        }

        return redirect()->back()->with('messages', "Nama atau Password Salah!");
    }

    public function logout()
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }
        ;

        if (Auth::guard('guru')->check()) {
            Auth::guard('guru')->logout();
        }
        ;

        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }
        ;

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
    public function registerpg()
    {
        $page = array(
            'halaman' => 'register',
        );
        return view('middleware.register', compact('page'));
    }

    public function register()
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|unique:users|unique:teachers|unique:admins|unique:useralumnis',
            'name' => 'required|unique:users|unique:teachers|unique:admins|unique:useralumnis',
            'password' => 'required',
        ], [
            'email.required' => 'Email mohon diisi',
            'email.unique' => 'Email sudah terpakai',
            'name.required' => 'Nama dimohon diisi',
            'name.unique' => 'Nama sudah terpakai',
            'password.required' => 'Mohon isi Password',
        ]);

        if ($validator->fails()) {
            return back()->with('fail', $validator->messages()->get('*'));
        }

        User::create([
            'email' => request()->input('email'),
            'name' => request()->input('name'),
            'password' => bcrypt(request()->input('password')),
        ]);

        return redirect('/login')->with('success', 'Akun berhasil untuk dibuat');
    }

    public function viewuser()
    {
        $page = array(
            'halaman' => 'admin',
            'data' => User::get(),
        );

        return view('user.index', compact('page'));
    }
    public function viewguru()
    {
        $page = array(
            'halaman' => 'admin',
            'data' => Teacher::get(),
        );

        return view('user.index', compact('page'));
    }
    public function viewalumni()
    {
        $page = array(
            'halaman' => 'viewalumni',
            'data' => useralumni::get(),
        );

        return view('user.index', compact('page'));
    }

    public function alumniIndex()
    {
        $page = array(
            'halaman' => 'createalumni',
            'data' => alumni::get(),
        );

        return view('alumni.account', compact('page'));
    }
    public function AlumniCreate()
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|unique:users,email|unique:teachers,email|unique:admins,email|unique:useralumnis,email',
            'name' => 'required|unique:users,name|unique:teachers,name|unique:admins,name|unique:useralumnis,username',
            'nisn' => 'required|unique:alumnis, id',
            'password' => 'required',
        ], [
            'email.required' => 'Email Alumni Harap Diisi',
            'email.unique' => 'Email ini sudah digunakan',
            'name.required' => 'Nama Alumni harap diisi',
            'name.unique' => 'Username ini sudah digunakan',
            'nisn.required' => 'NISN harap diisi',
            'nisn.unique' => 'NISN ini sudah digunakan oleh Alumni lain',
            'password.required' => 'Password Harap diisi'
        ]);
    }
}
