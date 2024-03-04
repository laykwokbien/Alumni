@extends('template.master')

@section('dashboard')
    <div class="container-fluid d-flex" id="about">
        <h1>Tentang Sekolah</h1>
    </div>
    <div class="container">
        <h1 class="text-center mb-5">Tentang Sekolah</h1>
        <div class="d-flex flex-column gap-5">
            <h2 class="text-center">Lokasi</h2>
            <div class="row">
                <div class="col-6 desc-location">
                    SMK Negeri 1 Bondowoso, adalah Sekolah Menengah Kejuruan yang berada pada Jl. HOS Cokroaminoto,
                    Kademangan,
                    Bondowoso, Kabupaten Bondowoso, Jawa Timur, Indonesia dengan NPSN 20521724
                </div>
                <div class="col-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15807.134955104526!2d113.8386369!3d-7.9176446!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6dcb914a78cff%3A0xc529d84253821bd1!2sSMKN%201%20Bondowoso!5e0!3m2!1sid!2sid!4v1709535654996!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center gap-5 mt-5" id="visi">

        </div>
    </div>
@endsection
