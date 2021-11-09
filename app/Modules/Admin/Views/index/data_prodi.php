<?= $this->extend('App\Modules\Admin\Views\layout\template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <center>
        <h1>PORTAL SURAT MAHASISWA FMIPA ULM</h1>
        <h4>Daftar Prodi</h4>
    </center>

    <div class="row">

        <div class="col">

            <form class="d-flex justify-content-between" method="post" action="">
                <a href="/Pengguna/create" class="btn btn-success">Tambah Data</a>

            </form>
            <br>
            <table class="table table-stripped table-responsive" style="align-items: center;">
                <thead>
                    <tr class="bg-success" style="text-align: center;">

                        <th scope="col">No</th>
                        <th scope="col">Nama Prodi</th>
                        <th scope="col">Tanggal Berdiri Prodi</th>
                        <th scope="col">Tanggal diinput</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($prodi as $row) :
                    ?>
                        <tr style="text-align: center;">

                            <td><?= $no++; ?></td>
                            <td><?= $row['nama_prodi'] ?></td>
                            <td><?= $row['tanggal_berdiri'] ?></td>
                            <td><?= $row['prodi_created_at'] ?></td>
                            <td align="center">
                                <button type="button" class="btn btn-warning" style="margin: 2px;"><a href="<?= base_url() . "/Pengguna/edit/" . $row['id_prodi'] ?>">Edit</a></button><span>
                                    <button type="button" class="btn btn-danger" style="margin: 2px;"><a href="<?= base_url() . "/Pengguna/hapus/" . $row['id_prodi'] ?>">Hapus</a></button>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>