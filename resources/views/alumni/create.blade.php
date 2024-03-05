@extends('template.dashboard')

@section('dashboard')
    <div class="position-absolute messages d-flex flex-column w-100 align-items-center pe-none">
        @if (session()->has('fail'))
            @foreach (session('fail') as $col)
                @foreach ($col as $messages)
                    <div class="alert alert-danger pe-none">
                        {{ $messages }}
                    </div>
                @endforeach
            @endforeach
        @else
            @if (session()->has('success'))
                <div class="alert alert-success pe-none">
                    {{ session('success') }}
                </div>
            @endif
        @endif
        @if (session()->has('messages'))
            <div class="alert alert-danger pe-none">
                {{ session('messages') }}
            </div>
        @endif
    </div>
    <div class="position-absolute d-flex justify-content-end align-items-end pe-none" style="width: 95%;height: 85%">
        <a href="{{ url('view/alumni') }}" class="text-black pe-auto" data-btn="backcreate">
            <span>&#8678;</span><span>Back</span>
        </a>
    </div>
    <form class="container w-100 vh-100 d-flex align-items-center" action="" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="row w-100 gap-2 justify-content-center">
            <div class="col-5 d-flex flex-column align-items-center justify-content-center">
                <div class="mb-3 w-100">
                    <label for="foto" class="form-label">Foto:</label>
                    <input autocomplete="off" type="file" name="foto" id="foto" class="form-control"
                        autocomplete="off">
                </div>
                <div class="mb-3 w-100">
                    <label for="nama" class="form-label">Nama: </label>
                    <input autocomplete="off" type="text" class="form-control" autocomplete="off" name="nama">
                </div>
                <div class="mb-3 w-100">
                    <label for="nisn" class="form-label">NISN: </label>
                    <input autocomplete="off" type="number" name="nisn" id="nisn" minlength="10" maxlength="10"
                        class="form-control" autocomplete="off">
                </div>
                <div class="mb-3 w-100">
                    <label for="jurusan" class="form-label">Jurusan:</label>
                    <select name="jurusan" id="jurusan" class="form-control">
                        <option selected hidden disabled>Jurusan yang telah dipilih</option>
                        @foreach ($page['jurusan'] as $jurusan)
                            <option value="{{ $jurusan['id'] }}">{{ $jurusan['nama'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 w-100">
                    <label for="ttl" class="form-label">Tempat, Tanggal Lahir:</label>
                    <input autocomplete="off" type="text" name="ttl" id="ttl" class="form-control">
                </div>
                <div class="mb-3 w-100">
                    <label for="alamat" class="form-label">Alamat:</label>
                    <input autocomplete="off" type="text" name="alamat" id="alamat" class="form-control">
                </div>
                <div class="mb-3 w-100">
                    <label for="tlp" class="form-label">No. Telp:</label>
                    <input autocomplete="off" type="number" name="tlp" id="tlp" class="form-control"
                        autocomplete="off">
                </div>
            </div>
            <div class="col-5 d-flex flex-column align-items-center justify-content-center">
                <div class="mb-3 w-100 border border-secondary p-3">
                    <p>Dapat dikosongkan</p>
                    <label for="instagram" class="form-label">Instagram</label>
                    <input autocomplete="off" type="text" class="form-control" autocomplete="off" name="instagram">
                    <label for="facebook" class="form-label">Facebook</label>
                    <input autocomplete="off" type="text" class="form-control" autocomplete="off" name="facebook">
                    <label for="twitter" class="form-label">Twitter</label>
                    <input autocomplete="off" type="text" class="form-control" autocomplete="off" name="twitter">
                </div>
                <div class="mb-3 w-100">
                    <label for="tahun_lulus" class="form-label">Tahun Lulus:</label>
                    <input autocomplete="off" type="number" name="tahun_lulus" id="tahun_lulus" class="form-control"
                        autocomplete="off">
                </div>
                <div class="mb-3 w-100">
                    <label for="setelah_lulus" class="form-label">Setelah Lulus:</label>
                    <select name="setelah_lulus" class="form-control">
                        <option hidden selected disabled>Pilih</option>
                        <option value="Pengangguran">Pengangguran</option>
                        <option value="Kerja">Kerja</option>
                        <option value="Kuliah">Kuliah</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-25">Kirim</button>
        </div>
    </form>
@endsection
