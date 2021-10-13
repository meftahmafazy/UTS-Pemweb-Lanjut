<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php

use App\Models\ModelProdi;
use App\Models\ModelMhs;
use App\Models\ModelSurat;
?>
<div class="container">

  <!-- Title -->
  <center>
    <h1>EDIT DATA SURAT MAHASISWA FMIPA ULM </h1>
  </center>
  <div class="row">
    <div class="col">

      <!-- Form -->
      <form action="<?= base_url('/surat/update/' . $mahasiswa['no_surat']) ?>" method="POST" enctype="multipart/form-data">

<!-- ROW 1 -->
          <!-- Nama -->
          <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputName">Nama</label>
            <input type="text" class="form-control" id="inputEmail4" name="nama_mahasiswa" value="<?= $mahasiswa['nama_mahasiswa'] ?>">
          </div>

          <!-- NIM -->
          <div class="form-group col-md-6">
            <label for="inputPassword4">NIM</label>
            <input type="text" class="form-control" id="inputPassword4" name="nim" value="<?= $mahasiswa['nim'] ?>">
          </div>
        </div>


        <div class="form-group">
          <!-- ROW 2 -->
          <!-- Email -->
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Email</label>
              <input type="email" class="form-control" id="inputEmail4" name="email" value="<?= $mahasiswa['email'] ?>">
            </div>

            <!-- No HP -->
            <div class="form-group col-md-6">
              <label for="inputPassword4">Angkatan</label>
              <input type="text" class="form-control" id="inputPassword4" name="angkatan" value="<?= $mahasiswa['angkatan'] ?>">
            </div>
          </div>

          
          <div class="form-group">
<!-- ROW 3 -->
            <div class="form-row">

              <!-- Keperluan -->
              <div class="form-group col-md-6">
                <label for="inputAddress">Keperluan</label>
                <input type="text" class="form-control" id="inputAddress" name="keperluan" value="<?= $mahasiswa['keperluan'] ?>">
              </div>

              <!-- Tanggal Surat -->
              <div class="form-group col-md-6">
                <label for="inputAddress">Tanggal Surat</label>
                <div class="input-group input-daterange"> <input type="date" id="start" class="form-control" name="tanggal_surat" value="<?= $mahasiswa['tanggal_surat'] ?>"></div>
              </div>
            </div>
          </div>

         
          <div class="form-group">
            <!--ROW 4  -->
            <div class="form-row">
 <!-- Prodi -->
              <div class="form-group col-md-4">
                <label for="inputState">Program Studi</label>
                <select id="inputState" class="form-control" name="prodi">
                  <option selected disabled>Choose...</option>
                  <?php
                  $Prodi = new ModelProdi();
                  $dataProdi = $Prodi->getProdi();
                  foreach ($dataProdi as $row) {
                  ?>
                    <option value="<?= $row['id_prodi'] ?> " <?php echo ($mahasiswa['id_prodi'] == $row['id_prodi']) ? "selected" : " " ?>>
                      <?= $row['nama_prodi'] ?>
                    </option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <div class="form-row">

                  <!-- Semester -->
                  <div class="form-group col-md-4">
                    <label for="inputState">Semester</label>
                    <input type="text" class="form-control" name="semester" id="inputAddress" placeholder="II" value="<?= $mahasiswa['semester'] ?>">
                  </div>

                  <!-- Jenis Surat -->
                  <div class="form-group col-md-4">
                    <label for="inputState">Jenis Surat</label>
                    <select id="inputState" class="form-control" name="id_jenisSurat" ?>">
                      <option selected disabled>Choose...</option>
                      <?php
                      $Surat = new ModelSurat();
                      $dataProdi = $Surat->getSurat();
                      foreach ($dataProdi as $row) {
                      ?>
                        <option value="<?= $row['id_jenisSurat'] ?> " <?php echo ($mahasiswa['id_jenisSurat'] == $row['id_jenisSurat']) ? "selected" : " " ?>>
                          <?= $row['nama_jenisSurat'] ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>

                  <!-- Jenis Kelamin -->
                  <div class="form-group col-md-4">
                    <label for="">Jenis Kelamin</label>
                    <div class="form-row">
                      <div class="form-check">
                        <input type="radio" name="jenis_kelamin" value="Laki-Laki" <?php if ($mahasiswa['jenis_kelamin'] == 'Laki-Laki') echo 'checked' ?>>
                        <label class="form-check-label" for="exampleRadios2">
                          Laki-Laki
                          </label>
                          <input type="radio" name="jenis_kelamin" value="Perempuan" <?php if ($mahasiswa['jenis_kelamin'] == 'Perempuan') echo 'checked' ?>>
                          <label class="form-check-label" for="exampleRadios2">
                            Perempuan
                            </label>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>

              <div class="form-row">
              
              </div>

      </form>

    </div>
  </div>
  <center><button type="submit" class="btn btn-primary" name="daftar">Simpan</button></center>
</div>

<?= $this->endSection(); ?>