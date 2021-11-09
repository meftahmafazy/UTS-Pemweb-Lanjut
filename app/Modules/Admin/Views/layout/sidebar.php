<nav class="navbar navbar-expand-lg navbar-light bg-success">
    <div class="container d-flex justify-content-start">
        <a class="navbar-brand" href="#">PORTAL ADMIN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="<?= base_url('/admin/indexSurat') ?>">Data Surat</a>
                <a class="nav-link" href="<?= base_url('/admin/indexUser') ?>">Data User</a>
                <a class="nav-link" href="<?= base_url('/admin/indexProdi') ?>">Data Prodi</a>
                <a class="nav-link" href="<?= base_url('/pengguna/create') ?>">Tambah User</a>
                <a class="nav-link" href="<?= base_url('/prodi/create') ?>">Tambah Prodi</a>
                <a class="nav-link" href="<?= base_url('/login/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</nav>