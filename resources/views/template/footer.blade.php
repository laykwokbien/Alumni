@if (
    $page['halaman'] == 'home' ||
        $page['halaman'] == 'alumni' ||
        $page['halaman'] == 'berita' ||
        $page['halaman'] == 'about')
    <footer class="container-fluid bg-secondary d-flex align-items-end justify-content-center mt-5">
        <h1>@RPL 2024</h1>
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
