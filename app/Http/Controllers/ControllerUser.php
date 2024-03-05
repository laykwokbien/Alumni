<?php

namespace App\Http\Controllers;

use App\Models\alumni;
use App\Models\berita;
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
            'berita' => berita::get(),
            'jurusan' => jurusan::get(),
        );
        return view('index', compact('page'));
    }
    public function alumni()
    {
        $page = array(
            'halaman' => 'alumni',
            'alumni' => alumni::latest()->filter(request(['search'], ['jurusan']))->get(),
        );
        return view('alumni', compact('page'));
    }
    public function dashboard()
    {
        $data = array(
            'jurusan' => jurusan::get(),
            'alumni' => alumni::get(),
            'user' => User::get(),
        );
        return view('dashboard', compact('data'));
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
            return redirect()->intended('/view/alumni');
        }
        if (Auth::guard('admin')->attempt(['name' => request()->input('name'), 'password' => request()->input('password')])) {
            request()->session()->regenerate();
            return redirect()->intended('/admin/view/user');
        }
        if (Auth::guard('alumni')->attempt(['username' => request()->input('name'), 'password' => request()->input('password')])) {
            request()->session()->regenerate();
            return redirect()->intended('/view/alumni');
        }

        return redirect()->back()->with('messages', "Nama atau Password Salah!");
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
        if (Auth::guard('alumni')->check()) {
            Auth::guard('alumni')->logout();
        }

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
            'email' => 'required|unique:users,name|unique:teachers,name|unique:admins,name|unique:useralumnis,username',
            'name' => 'required|unique:users,name|unique:teachers,name|unique:admins,name|unique:useralumnis,username',
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
            'delete' => false,
        );

        return view('user.index', compact('page'));
    }
    public function viewguru()
    {
        $page = array(
            'halaman' => 'superadmin',
            'data' => Teacher::get(),
            'delete' => false,
        );

        return view('user.index', compact('page'));
    }
    public function viewalumni()
    {
        $page = array(
            'halaman' => 'viewalumni',
            'data' => useralumni::with('isData')->get(),
            'delete' => false,
        );

        return view('user.index', compact('page'));
    }
    public function ConfirmPage()
    {
        if (request()->session()->get('alumni') != null) {
            return redirect('/register/alumni');
        } else {
            $page = array(
                'halaman' => false,
                'data' => alumni::get(),
            );
        }
        return view('alumni.account', compact('page'));
    }
    public function ConfirmAlumni()
    {
        $useralumni = useralumni::with('isData')->get();
        foreach ($useralumni as $data) {
            if ($data->isData->nisn == request()->input('nisntemp')) {
                return redirect('/login')->with('messages', 'NISN ini telah digunakan oleh Alumni Lain');
            }
        }
        if (request()->input('nisntemp') === null) {
            return back()->with('messages', 'Mohon isi NISN dengan benar');
        }

        $data = alumni::get();
        foreach ($data as $item) {
            if ($item->nisn == request()->input('nisntemp')) {
                $info = array(
                    'id' => $item->id,
                    'nisn' => $item->nisn,
                    'alumni' => true
                );
                request()->session()->put('alumni', $info);
                return redirect('/register/alumni');
            }
        }
        return redirect('/login')->with('messages', 'Kamu bukan alumni dari sekolah ini!');
    }
    public function alumniIndex()
    {
        if (request()->session()->get('alumni') != null) {
            $data = request()->session()->get('alumni');
            if ($data['alumni'] == true) {
                $page = array(
                    'halaman' => $data['alumni'],
                    'data' => alumni::get(),
                );
                return view('alumni.account', compact(['page', 'data']));
            }
        } else {
            abort(403);
        }
    }

    public function return()
    {
        request()->session()->flush();

        return redirect('/login');
    }

    public function AlumniCreate()
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|unique:users,email|unique:teachers,email|unique:admins,email|unique:useralumnis,email',
            'name' => 'required|unique:users,name|unique:teachers,name|unique:admins,name|unique:useralumnis,username',
            'nisn' => 'required|unique:useralumnis,nisn',
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

        if ($validator->fails()) {
            return back()->with('fail', $validator->messages()->get('*'));
        }

        useralumni::create([
            'nisn' => request()->input('nisn'),
            'email' => request()->input('email'),
            'username' => request()->input('name'),
            'password' => bcrypt(request()->input('password')),
        ]);

        return redirect('/login')->with('success', 'Akun berhasil untuk dibuat');
    }

    public function gotoCreateguru()
    {
        $page = array(
            'halaman' => 'createguru',
        );
        return view('guru.create', compact('page'));
    }

    public function createguru()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|unique:useralumnis,username|unique:teachers,name|unique:admins,name|unique:users,name',
            'email' => 'required|unique:useralumnis,email|unique:teachers,email|unique:admins,email|unique:users,email',
            'password' => 'required',
        ], [
            'name.required' => 'Nama harap diisi dengan benar',
            'name.unique' => 'Username ini sudah digunakan',
            'email.required' => 'Email harap diisi dengan benar',
            'email.unique' => 'Email ini sudah digunakan',
            'password.required' => 'password harap diisi dengan benar',
        ]);

        if ($validator->fails()) {
            return back()->with('fails', $validator->messages()->get('*'));
        }

        Teacher::create([
            'name' => request()->input('name'),
            'email' => request()->input('email'),
            'password' => bcrypt(request()->input('password')),
        ]);

        return redirect('/admin/view/guru')->with('success', 'New Record has been successfully created');
    }

    public function confirmguru($id)
    {
        $page = array(
            'halaman' => 'superadmin',
            'data' => Teacher::get(),
            'delete' => true
        );
        return view('user.index', compact('page'));
    }
    public function deleteguru($id)
    {
        Teacher::where('id', $id)->delete();
        return redirect('/admin/view/guru')->with('success', 'Record has been successfully deleted');
    }
}
