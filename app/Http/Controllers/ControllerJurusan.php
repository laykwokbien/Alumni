<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ControllerJurusan extends Controller
{
    public function index()
    {
        $page = array(
            'halaman' => 'create',
            'delete' => false,
            'data' => jurusan::with('alumnis')->get(),
        );

        return view('jurusan.index', compact('page'));
    }

    public function create()
    {
        $validator = Validator::make(request()->all(), [
            'foto' => 'required|image',
            'nama' => 'required|unique:jurusans',
        ], [
            'foto.required' => 'Foto Jurusan Harap Diserahkan',
            'foto.image' => 'File Foto harap dalam bentuk file foto',
            'nama.required' => 'Nama Jurusan Harus Diisi',
            'nama.unique' => 'Nama Jurusan Sudah Ada!',
        ]);

        if ($validator->fails()) {
            return back()->with('fail', $validator->messages()->get('*'));
        }

        request()->file('foto')->store("jurusans");

        jurusan::create([
            'foto' => request()->file('foto')->store("jurusans"),
            'nama' => request()->input('nama'),
        ]);

        return redirect('/create/jurusan')->with('success', 'Record baru berhasil untuk dibuat');
    }
    public function view($id)
    {
        $id = jurusan::find($id);
        $page = array(
            'halaman' => 'update',
        );
        return view('jurusan.update', compact('page', 'id'));
    }

    public function update($id)
    {

        $validator = Validator::make(request()->all(), [
            'foto' => 'image',
            'nama' => "required|unique:jurusans,nama," . $id,
        ], [
            'foto.image' => 'File Foto harap dalam bentuk file foto',
            'nama.required' => 'Nama Jurusan Harus Diisi',
            'nama.unique' => 'Nama Jurusan Sudah Ada!',
        ]);

        if ($validator->fails()) {
            return back()->with('fail', $validator->messages()->get('*'));
        }

        if (request()->file("foto") != "") {
            $data = jurusan::find($id);
            Storage::delete($data->foto);
            request()->file('foto')->store("jurusans");
            jurusan::where('id', $id)->update([
                'foto' => request()->file('foto')->store('jurusans'),
                'nama' => request()->input('nama'),
            ]);
        }

        jurusan::where('id', $id)->update([
            'nama' => request()->input('nama'),
        ]);

        return redirect('/create/jurusan')->with('success', 'Record berhasil untuk diperbaharui');
    }
    public function confirm($id)
    {
        $page = array(
            'halaman' => 'create',
            'delete' => true,
            'data' => jurusan::with('alumnis')->get(),
        );

        return view('jurusan.index', compact('page'));
    }
    public function delete($id)
    {

        $jurusan = jurusan::with('alumnis')->find($id);
        
        
        if (count($jurusan->alumnis) >= 1) {
            return redirect('/create/jurusan')->with('messages', 'Tidak dapat menghapus jurusan ini dikarenakan terdapat Alumni yang telah menggunakan jurusan ini!');
        }
        
        Storage::delete($jurusan->foto);
        jurusan::where('id', $id)->delete();

        return redirect('/create/jurusan')->with('success', 'Record berhasil untuk dihapus');
    }
}
