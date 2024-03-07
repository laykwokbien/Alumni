<?php

namespace App\Http\Controllers;

use App\Models\alumni;
use App\Models\jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ControllerAlumni extends Controller
{
    public function index()
    {
        $page = array(
            'halaman' => 'view',
            'delete' => false,
            'data' => alumni::with('isjurusan')->paginate(5),
            'jurusan' => jurusan::get(),
        );

        return view('alumni.index', compact('page'));
    }

    public function gotocreate()
    {
        $page = array(
            'halaman' => 'view',
            'jurusan' => jurusan::get(),
        );
        return view('alumni.create', compact('page'));
    }
    public function create()
    {
        // dd((request()->input('nisn')));
        $validator = Validator::make(request()->all(), [
            'foto' => 'required|image',
            'nama' => 'required|unique:alumnis',
            'nisn' => 'required|numeric|unique:alumnis|digits:10',
            'jurusan' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'tlp' => 'required|unique:alumnis|digits:12',
            'tahun_lulus' => 'required',
            'setelah_lulus' => 'required',
        ], [
            'foto.required' => 'foto harap diisi',
            'foto.image' => 'Harap diisi file yang berupa gambar',
            'nama.required' => 'Nama Alumni harus diisi',
            'nama.unique' => 'Nama Alumni sudah terdaftar',
            'nisn.required' => 'NISN harap untuk diisi',
            'nisn.digits' => 'NISN harus memiliki 10 karakter',
            'nisn.numeric' => 'NISN harus diisi dalam bentuk angka/number',
            'nisn.unique' => 'NISN sudah digunakan',
            'jurusan.required' => 'Jurusan Alumni harap diisi',
            'ttl.required' => 'Tempat, Tanggal Lahir Alumni harap diisi',
            'alamat.required' => 'Alamat Mohon harap diisi',
            'tlp.required' => 'Nomer Telepon harap diisi',
            'tlp.unique' => 'Nomer Telepon sudah digunakan',
            'tlp.digits' => 'Nomer Telepon harus memiliki 12 karakter',
            'tahun_lulus.required' => 'Tahun Kelulusan Alumni Harap Diisi',
            'setelah_lulus.required' => 'Harap Diisi Kolom Seletah lulus',
        ]);



        if ($validator->fails()) {
            return back()->with('fail', $validator->messages()->get('*'));
        }

        request()->file('foto')->store('alumnis');

        alumni::create([
            'foto' => request()->file('foto')->store('alumnis'),
            'nama' => request()->input('nama'),
            'nisn' => request()->input('nisn'),
            'jurusan' => request()->input('jurusan'),
            'ttl' => request()->input('ttl'),
            'tlp' => request()->input('tlp'),
            'alamat' => request()->input('alamat'),
            'instagram' => request()->input('instagram'),
            'facebook' => request()->input('facebook'),
            'twitter' => request()->input('twitter'),
            'tahun_lulus' => request()->input('tahun_lulus'),
            'setelah_lulus' => request()->input('setelah_lulus'),
        ]);

        return redirect('/view/alumni')->with('success', 'Record baru berhasil untuk dibuat');
    }

    public function show($id)
    {
        $id = alumni::with('isjurusan')->find($id);
        $page = array(
            'halaman' => 'show',
        );
        return view('alumni.show', compact('id', 'page'));
    }

    public function view($id)
    {
        $id = alumni::find($id);
        $page = array(
            'halaman' => 'update',
            'jurusan' => jurusan::get(),
        );
        return view('alumni.update', compact('page', 'id'));
    }

    public function update($id)
    {
        $validator = Validator::make(request()->all(), [
            'foto' => 'image',
            'nama' => "required|unique:alumnis,nama,$id",
            'nisn' => "required|numeric|unique:alumnis,nisn,$id|digits:10",
            'jurusan' => 'required',
            'ttl' => 'required',
            'tlp' => "required|unique:alumnis,tlp,$id|digits:12",
            'tahun_lulus' => 'required',
            'setelah_lulus' => 'required',
        ], [
            'foto.image' => 'Harap diisi file yang berupa gambar',
            'nama.required' => 'Nama Alumni harus diisi',
            'nama.unique' => 'Nama Alumni sudah terdaftar',
            'nisn.required' => 'NISN harap untuk diisi',
            'nisn.digits' => 'NISN harus memiliki 10 karakter',
            'nisn.numeric' => 'NISN harus diisi dalam bentuk angka/number',
            'nisn.unique' => 'NISN sudah digunakan',
            'jurusan.required' => 'Jurusan Alumni harap diisi',
            'ttl.required' => 'Tempat, Tanggal Lahir Alumni harap diisi',
            'tlp.required' => 'Nomer Telepon harap diisi',
            'tlp.unique' => 'Nomer Telepon sudah digunakan',
            'tlp.digits' => 'Nomer Telepon harus memiliki 12 karakter',
            'tahun_lulus.required' => 'Tahun Kelulusan Alumni Harap Diisi',
            'setelah_lulus.required' => 'Harap Diisi Kolom Seletah lulus',
        ]);

        if ($validator->fails()) {
            return back()->with('fail', $validator->messages()->get('*'));
        }

        if (request()->file('foto') != '') {
            request()->file('foto')->store('alumnis');
            alumni::where('id', $id)->update([
                'foto' => request()->file('foto')->store('alumnis'),
                'nama' => request()->input('nama'),
                'nisn' => request()->input('nisn'),
                'jurusan' => request()->input('jurusan'),
                'ttl' => request()->input('ttl'),
                'tlp' => request()->input('tlp'),
                'alamat' => request()->input('alamat'),
                'instagram' => request()->input('instagram'),
                'facebook' => request()->input('facebook'),
                'twitter' => request()->input('twitter'),
                'tahun_lulus' => request()->input('tahun_lulus'),
                'setelah_lulus' => request()->input('setelah_lulus'),
            ]);
        }

        alumni::where('id', $id)->update([
            'nama' => request()->input('nama'),
            'nisn' => request()->input('nisn'),
            'jurusan' => request()->input('jurusan'),
            'ttl' => request()->input('ttl'),
            'tlp' => request()->input('tlp'),
            'alamat' => request()->input('alamat'),
            'instagram' => request()->input('instagram'),
            'facebook' => request()->input('facebook'),
            'twitter' => request()->input('twitter'),
            'tahun_lulus' => request()->input('tahun_lulus'),
            'setelah_lulus' => request()->input('setelah_lulus'),
        ]);

        return redirect('/view/alumni')->with('success', 'Record berhasil untuk diperbaharui');
    }
    public function confirm($id)
    {
        $page = array(
            'halaman' => 'create',
            'delete' => true,
            'data' => alumni::with('isjurusan')->get(),
        );

        return view('alumni.index', compact('page'));
    }
    public function delete($id)
    {
        alumni::where('id', $id)->delete();

        return redirect('/view/alumni')->with('success', 'Record berhasil untuk dihapus');
    }
}
