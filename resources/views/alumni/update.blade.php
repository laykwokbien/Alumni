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
    <form class="container w-100 vh-100 d-flex align-items-cente" action="" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="row w-100 gap-2 justify-content-center ">
            <div class="col-5 d-flex flex-column align-items-center justify-content-center">
                <div class="mb-3 w-100">
                    <label for="foto" class="form-label">Foto:</label>
                    <input autocomplete="off" type="file" name="foto" id="foto" class="form-control"
                        autocomplete="off">
                </div>
                <div class="mb-3 w-100">
                    <label for="nama" class="form-label">Nama: </label>
                    <input autocomplete="off" type="text" class="form-control" autocomplete="off" name="nama"
                        value="{{ $id->nama }}">
                </div>
                <div class="mb-3 w-100">
                    <label for="nisn" class="form-label">NISN: </label>
                    <input autocomplete="off" type="number" name="nisn" id="nisn" minlength="10" maxlength="10"
                        class="form-control" autocomplete="off" value="{{ $id->nisn }}">
                </div>
                <div class="mb-3 w-100">
                    <label for="jurusan" class="form-label">Jurusan:</label>
                    <select name="jurusan" id="jurusan" class="form-control">
                        @foreach ($page['jurusan'] as $jurusan)
                            @if ($jurusan->id == $id->jurusan)
                                <option {{ 'selected' }} value="{{ $jurusan['id'] }}">{{ $jurusan['nama'] }}</option>
                            @else
                                <option value="{{ $jurusan['id'] }}">{{ $jurusan['nama'] }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 w-100">
                    <label for="ttl" class="form-label">Tempat, Tanggal Lahir:</label>
                    <input autocomplete="off" type="text" name="ttl" id="ttl" class="form-control"
                        value="{{ $id->ttl }}">
                </div>
                <div class="mb-3 w-100">
                    <label for="alamat" class="form-label">Alamat:</label>
                    <input autocomplete="off" type="text" name="alamat" id="alamat" class="form-control"
                        value="{{ $id->alamat }}">
                </div>
                <div class="mb-3 w-100">
                    <label for="tlp" class="form-label">No. Telp:</label>
                    <input autocomplete="off" type="number" name="tlp" id="tlp" class="form-control"
                        autocomplete="off" value="{{ $id->tlp }}">
                </div>
            </div>
            <div class="col-5 d-flex flex-column align-items-center justify-content-center">
                <div class="mb-3 w-100 border border-secondary p-3">
                    <p>Dapat dikosongkan</p>
                    <label for="instagram" class="form-label">Instagram</label>
                    <input autocomplete="off" type="text" class="form-control" autocomplete="off" name="instagram"
                        value="{{ $id->instagram }}">
                    <label for="facebook" class="form-label">Facebook</label>
                    <input autocomplete="off" type="text" class="form-control" autocomplete="off" name="facebook"
                        value="{{ $id->facebook }}">
                    <label for="twitter" class="form-label">Twitter</label>
                    <input autocomplete="off" type="text" class="form-control" autocomplete="off" name="twitter"
                        value="{{ $id->twitter }}">
                </div>
                <div class="mb-3 w-100">
                    <label for="tahun_lulus" class="form-label">Tahun Lulus:</label>
                    <input autocomplete="off" type="number" name="tahun_lulus" id="tahun_lulus" class="form-control"
                        autocomplete="off" value="{{ $id->tahun_lulus }}">
                </div>
                <div class="mb-3 w-100">
                    <label for="setelah_lulus" class="form-label">Setelah Lulus:</label>
                    <select name="setelah_lulus" class="form-control">
                        @if ($id->setelah_lulus == 'Pengangguran')
                            <option {{ 'selected' }} value="Pengangguran">Pengangguran</option>
                        @else
                            <option value="Pengangguran">Pengangguran</option>
                        @endif

                        @if ($id->setelah_lulus == 'Kerja')
                            <option {{ 'selected' }} value="Kerja">Kerja</option>
                        @else
                            <option value="Kerja">Kerja</option>
                        @endif

                        @if ($id->setelah_lulus == 'Kuliah')
                            <option {{ 'selected' }} value="Kuliah">Kuliah</option>
                        @else
                            <option value="Kuliah">Kuliah</option>
                        @endif
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-25" style="height: fit-content">Kirim</button>
        </div>
    </form>
@endsection
