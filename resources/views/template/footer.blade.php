@if (
    $page['halaman'] == 'home' ||
        $page['halaman'] == 'alumni' ||
        $page['halaman'] == 'berita' ||
        $page['halaman'] == 'about')
    <footer class="container-fluidcenter px-5 mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-12 col-lg-5 d-flex flex-column align-items-center">
                <img src="{{ asset('assets/images/smkn1bws.png') }}" alt="">
                <h2>SMKN 1 Bondowoso</h2>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <p class="footer-head">Ikuti Kami</p>
                <div class="d-flex gap-3">
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-whatsapp"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                </div>
                <div class="d-flex flex-column">
                    <p class="d-flex align-items-center gap-2"><i class="bi bi-envelope"></i>Email:
                        smkn1_bws@yahoo.com
                    </p>
                    <p class="d-flex align-items-center gap-2"><i class="bi bi-telephone-fill"></i>0332 - 431201
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 d-flex flex-column">
                <p class="footer-head">Jelajahi</p>
                <a href="{{ url('/') }}">Home</a>
                @if (Auth::guard('web')->check() ||
                        Auth::guard('guru')->check() ||
                        Auth::guard('admin')->check() ||
                        Auth::guard('alumni')->check())
                    <a href="{{ url('/alumni') }}">Alumni</a>
                @endif
                <a href="{{ url('/berita') }}">Berita</a>
                <a href="{{ url('/about') }}">Tentang</a>
            </div>
        </div>
        <div class="row py-3 mt-3 w-100" style="border-top: 2px solid #fff">
            <p class="text-center">@RPL 2024</p>
        </div>
    </footer>
@endif
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<style>
    trix-toolbar [data-trix-button-group="file-tools"] {
        display: none
    }
</style>
</body>

</html>
