<?php

namespace App\Http\Controllers;

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
            'nama' => 'required|unique:jurusans',
        ], [
            'nama.required' => 'Nama Jurusan Harus Diisi',
            'nama.unique' => 'Nama Jurusan Sudah Ada!',
        ]);

        if ($validator->fails()) {
            return back()->with('fail', $validator->messages()->get('*'));
        }

        jurusan::create([
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
            'nama' => 'required|unique:jurusans,nama,' . $id,
        ], [
            'nama.required' => 'Nama Jurusan Harus Diisi',
            'nama.unique' => 'Nama Jurusan Sudah Ada!',
        ]);

        if ($validator->fails()) {
            return back()->with('fail', $validator->messages()->get('*'));
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

        jurusan::where('id', $id)->delete();

        return redirect('/create/jurusan')->with('success', 'Record berhasil untuk dihapus');
    }
}
