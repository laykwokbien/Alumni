<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ControllerUser extends Controller
{
    public function index()
    {
        $page = array(
            'halaman' => 'home',
        );
        return view('index', compact('page'));
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

        return redirect()->back();
    }

    public function logout()
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        };

        if (Auth::guard('guru')->check()) {
            Auth::guard('guru')->logout();
        };

        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        };

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
            'email' => 'required|unique:users',
            'name' => 'required|unique:users',
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

    public function view()
    {
        $page = array(
            'halaman' => 'admin',
            'data' => User::get(),
        );

        return view('user.index', compact('page'));
    }
}
