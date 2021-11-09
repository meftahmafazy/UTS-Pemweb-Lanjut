  <?= $this->extend('layout/template'); ?>

  <?= $this->section('content'); ?>

  <div class="container">
    <center>
      <h1>PORTAL SURAT MAHASISWA FMIPA ULM</h1>
      <p>Berikut daftar-daftar surat yang telah diajukan.</p>
    </center>

    <div class="row">

      <div class="col">

        <form class="d-flex justify-content-between" method="post" action="">
          <a href="/surat/create" class="btn btn-success">Tambah Data</a>

        </form>
        <br>
        <table class="table table-stripped table-responsive">
          <thead>
            <tr class="bg-primary" style="text-align: center;">

              <th scope="col">Nomor Surat</th>
              <th scope="col">KTM</th>
              <th scope="col">Nama Mahasiswa</th>
              <th scope="col">NIM</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Prodi</th>
              <th scope="col">Tanggal Surat</th>
              <th scope="col">Jenis Surat</th>
              <th scope="col">Keperluan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1 + (2 * ($currentPage - 1));
            foreach ($mahasiswa as $row) :
            ?>
              <tr style="text-align: center;">

                <td><?= $no++; ?></td>
                <td>
                  <?php
                  $file = explode('.', $row['foto_mhs']);
                  $ext = ['png', 'jpg', 'jpeg'];
                  if (in_array($file[1], $ext)) {
                    echo '<img src="' . base_url('img/upload/' . $row['foto_mhs']) . '"  class="gambar" width="80px">';
                  } else {
                    echo '<a href="' . base_url('img/upload/' . $row['foto_mhs']) . '"  class="gambar" width="80px">' . $row['foto_mhs'] . '</a>';
                  }
                  ?>
                </td>
                <td><?= $row['nama_mahasiswa'] ?></td>
                <td><?= $row['nim'] ?></td>
                <td><?= $row['jenis_kelamin'] ?></td>
                <td><?= $row['nama_prodi'] ?></td>
                <td><?= $row['tanggal_surat'] ?></td>
                <td><?= $row['nama_jenisSurat'] ?></td>
                <td><?= $row['keperluan'] ?></td>
                <td align="center">
                  <button type="button" class="btn btn-warning" style="margin: 2px;"><a href="<?= base_url() . "/surat/edit/" . $row['no_surat'] ?>">Edit</a></button><span>
                    <button type="button" class="btn btn-danger" style="margin: 2px;"><a href="<?= base_url() . "/surat/hapus/" . $row['no_surat'] ?>">Hapus</a></button>
                  </span>
                </td>
              </tr>

            <?php endforeach; ?>
          </tbody>
        </table>
        <?= $pager->simpleLinks('mahasiswa', 'mhs_pagination'); ?>
      </div>
    </div>
  </div>

  <?= $this->endSection(); ?>