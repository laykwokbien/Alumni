@if (
    $page['halaman'] == 'home' ||
        $page['halaman'] == 'alumni' ||
        $page['halaman'] == 'berita' ||
        $page['halaman'] == 'about')
    <footer class="container-fluid d-flex justify-content-center gap-5 px-5">
        <div class="">
            <p class="footer-head">Ikuti Kami</p>
        </div>
        <div class="d-flex flex-column">
            <p class="footer-head">Jelajahi</p>
            <a class="footer-link" href="{{ url('/') }}">Home</a>
            <a class="footer-link" href="{{ url('/alumni') }}">Alumni</a>
            <a class="footer-link" href="{{ url('/berita') }}">Berita</a>
            <a class="footer-link" href="{{ url('/tentang') }}">Tentang</a>
        </div>
        <div class="d-flex flex-column">
            <p class="footer-head">Jelajahi</p>
            <a class="footer-link" href="#home">Home</a>
            <a class="footer-link" href="{{ url('/alumni') }}">Alumni</a>
            <a class="footer-link" href="{{ url('/berita') }}">Berita</a>
            <a class="footer-link" href="{{ url('/tentang') }}">Tentang</a>
        </div>
        <div class="d-flex flex-column">
            <p class="footer-head">Jelajahi</p>
            <a class="footer-link" href="#home">Home</a>
            <a class="footer-link" href="{{ url('/alumni') }}">Alumni</a>
            <a class="footer-link" href="{{ url('/berita') }}">Berita</a>
            <a class="footer-link" href="{{ url('/tentang') }}">Tentang</a>
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
