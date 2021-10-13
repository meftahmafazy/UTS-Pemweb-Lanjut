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
    <h1>PEMBUATAN SURAT MAHASISWA FMIPA ULM </h1>
  </center>
  <div class="row">
    <div class="col">

      <!-- Form -->
      <form action="/surat/simpan" method="POST" enctype="multipart/form-data">
        <div class="form-row">

          <!-- Nama -->
          <div class="form-group col-md-6">
            <label for="inputName">Nama</label>
            <input type="text" class="form-control" id="inputEmail4" name="nama_mahasiswa" required>
          </div>

          <!-- NIM -->
          <div class="form-group col-md-6">
            <label for="inputPassword4">NIM</label>
            <input type="text" class="form-control" id="inputPassword4" name="nim" required>
          </div>
        </div>


        <div class="form-group">
          <!-- Email -->
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Email</label>
              <input type="email" class="form-control" id="inputEmail4" name="email" required>
            </div>

            <!-- No HP -->
            <div class="form-group col-md-6">
              <label for="inputPassword4">Angkatan</label>
              <input type="text" class="form-control" id="inputPassword4" name="angkatan" required>
            </div>
          </div>

          <!-- Keperluan -->
          <div class="form-group">
            <div class="form-row">

              <!-- Keperluan -->
              <div class="form-group col-md-6">
                <label for="inputAddress">Keperluan</label>
                <input type="text" class="form-control" id="inputAddress" name="keperluan" required>
              </div>

              <!-- Tanggal Surat -->
              <div class="form-group col-md-6">
                <label for="inputAddress">Tanggal Surat</label>
                <div class="input-group input-daterange"> <input type="date" id="start" class="form-control" name="tanggal_surat" required></div>
              </div>
            </div>
          </div>

          <!-- Prodi -->
          <div class="form-group">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputState">Program Studi</label>
                <select id="inputState" class="form-control" name="prodi" required>
                  <option selected>Choose...</option>
                  <?php
                  $Prodi = new ModelProdi();
                  $dataProdi = $Prodi->getProdi();
                  foreach ($dataProdi as $row) {
                  ?>
                    <option value="<?= $row['id_prodi'] ?>"> <?= $row['nama_prodi'] ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <div class="form-row">

                  <!-- Semester -->
                  <div class="form-group col-md-4">
                    <label for="inputState">Semester</label>
                    <input type="text" class="form-control" name="semester" id="inputAddress" placeholder="II" required>
                  </div>

                  <!-- Jenis Surat -->
                  <div class="form-group col-md-4">
                    <label for="inputState">Jenis Surat</label>
                    <select id="inputState" class="form-control" name="id_jenisSurat" required>
                      <option selected>Choose...</option>
                      <?php
                      $Surat = new ModelSurat();
                      $dataProdi = $Surat->getSurat();
                      foreach ($dataProdi as $row) {
                      ?>
                        <option value="<?= $row['id_jenisSurat'] ?>"> <?= $row['nama_jenisSurat'] ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <!-- Jenis Kelamin -->
                  <div class="form-group col-md-4">
                    <label for="">Jenis Kelamin</label>
                    <div class="form-row">
                      <div class="form-check">
                        <input type="radio" name="jenis_kelamin" id="exampleRadios2" value="Laki-Laki" required>
                        <label class="form-check-label" for="exampleRadios2">
                          Laki-Laki
                        </label>
                        <input type="radio" name="jenis_kelamin" id="exampleRadios2" value="Perempuan" required>
                        <label class="form-check-label" for="exampleRadios2">
                          Perempuan
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

      </form>

    </div>
  </div>
  <center>
    <button type="submit" class="btn btn-primary" name="daftar">Simpan</button>
    <button type="reset" class="btn btn-danger" name="daftar">Ulang</button>
  </center>
  
</div>

<?= $this->endSection(); ?>