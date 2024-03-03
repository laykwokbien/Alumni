<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ControllerBerita extends Controller
{
    public function index()
    {
        $page = array(
            'halaman' => 'berita',
            'data' => berita::get(),
            'delete' => false,
        );
        return view('berita.index', compact('page'));
    }

    public function gotoCreate()
    {
        $page = array(
            'halaman' => 'createberita',
        );
        return view('berita.create', compact('page'));
    }

    public function create()
    {
        $validator = Validator::make(request()->all(), [
            'foto' => 'required',
            'judul' => 'required|unique:beritas,judul',
            'desc' => 'required',
        ], [
            'foto.required' => "Foto Berita harap diisi dengan benar",
            'judul.required' => "Judul harap diisi dengan benar",
            'judul.unique' => 'Judul sudah digunakan',
            'desc.required' => 'Deskripsi Berita harap diisi',
        ]);

        if ($validator->fails()) {
            return back()->with('fail', $validator->messages()->get('*'));
        }

        request()->file('foto')->store('/berita');

        berita::create([
            'foto' => request()->file('foto')->store('/foto'),
            'judul' => request()->input('judul'),
            'desc' => request()->input('desc'),
        ]);

        return redirect('/berita')->with('success', 'Data baru berhasil untuk ditambahkan');
    }
    public function gotoUpdate($id)
    {
        $id = berita::find($id);
        $page = array(
            'halaman' => 'update',
        );
        return view('berita.update', compact(['page', 'id']));
    }
    public function update($id)
    {
        $validator = Validator::make(request()->all(), [
            'foto' => 'required',
            'judul' => 'required|unique:beritas,judul,' + $id,
            'desc' => 'required',
        ], [
            'foto.required' => "Foto Berita harap diisi dengan benar",
            'judul.required' => "Judul harap diisi dengan benar",
            'judul.unique' => 'Judul sudah digunakan',
            'desc.required' => 'Deskripsi Berita harap diisi',
        ]);

        if ($validator->fails()) {
            return back()->with('fail', $validator->messages()->get('*'));
        }

        if (request()->file() != null) {
            request()->file('foto')->store('/berita');

            berita::create([
                'foto' => request()->file('foto')->store('/foto'),
                'judul' => request()->input('judul'),
                'desc' => request()->input('desc'),
            ]);
        }

        berita::where('id', $id)->update([
            'judul' => request()->input('judul'),
            'desc' => request()->input('desc'),
        ]);

        return redirect('/berita')->with('success', 'Data berhasil untuk diperbarui');
    }

    public function confirm($id)
    {
        $page = array(
            'halaman' => 'berita',
            'data' => berita::get(),
            'delete' => true,
        );
        return view('berita.index');
    }

    public function delete($id)
    {
        berita::where('id', $id)->delete();

        return redirect('/berita')->with('success', 'Data berhasil untuk dihapus');
    }
}