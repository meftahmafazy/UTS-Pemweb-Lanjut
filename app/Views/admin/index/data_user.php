<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
  <center>
    <h1>PORTAL SURAT MAHASISWA FMIPA ULM</h1>
    <h4>Daftar User</h4>
  </center>

  <div class="row">

    <div class="col">

      <form class="d-flex justify-content-between" method="post" action="">
        <a href="/pengguna/create" class="btn btn-success">Tambah Data</a>

      </form>
      <br>
      <table class="table table-stripped table-responsive">
        <thead>
          <tr class="bg-success" style="text-align: center;">

            <th scope="col">Nomor Surat</th>
            <th scope="col">Nama</th>
            <th scope="col">NIM</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($user as $row) :
          ?>
            <tr style="text-align: center;">

              <td><?= $no++; ?></td>
              <td><?= $row['nama_mhs'] ?></td>
              <td><?= $row['nim_mhs'] ?></td>
              <td><?= $row['email_mhs'] ?></td>
              <td><?= $row['role'] ?></td>
              <td align="center">
                <button type="button" class="btn btn-warning" style="margin: 2px;"><a href="<?= base_url() . "/pengguna/edit/" . $row['id_user'] ?>">Edit</a></button><span>
                  <button type="button" class="btn btn-danger" style="margin: 2px;"><a href="<?= base_url() . "/pengguna/hapus/" . $row['id_user'] ?>">Hapus</a></button>
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