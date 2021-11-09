<?= $this->extend('App\Modules\Admin\Views\layout\template'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <!-- Title -->
    <center>
        <h1>Input User</h1>
    </center>
    <div class="row">
        <div class="col">

            <!-- Form -->
            <form method="POST" action="<?= base_url('/pengguna/simpan') ?>" class="my-login-validation" novalidate="" style="align-items: center;">

                <!-- Nama -->
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input id="name" type="text" class="form-control <?= ($validation->hasError('nama_mhs')) ? 'is-invalid' : ''; ?>" name="nama_mhs" value="" required autofocus>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama_mhs') ?>
                    </div>
                </div>

                <!-- NIM -->
                <div class="form-group">
                    <label for="name">NIM</label>
                    <input id="name" type="text" class="form-control <?= ($validation->hasError('nim_mhs')) ? 'is-invalid' : ''; ?>" name="nim_mhs" value="" required autofocus>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nim_mhs') ?>
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">E-Mail Address</label>
                    <input id="email" type="email" class="form-control <?= ($validation->hasError('email_mhs')) ? 'is-invalid' : ''; ?>" name="email_mhs" value="" required>
                    <div class="invalid-feedback">
                        <?= $validation->getError('email_mhs') ?>
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control <?= ($validation->hasError('pass_mhs')) ? 'is-invalid' : ''; ?> " name="pass_mhs" required data-eye>
                    <div class="invalid-feedback">
                        <?= $validation->getError('pass_mhs') ?>
                    </div>
                </div>

                <!-- Role -->
                <div class="form-group">
                    <label for="inputState">Role</label>
                    <select id="inputState" class="form-control" name="role" value="<?= old('role'); ?>" required>
                        <option selected>Choose...</option>
                        <option name="role" value="admin">Admin</option>
                        <option name="role" value="user">User</option>
                    </select>
                </div>

                <center>
                    <button type="submit" class="btn btn-primary" name="daftar">Simpan</button>
                    <button type="reset" class="btn btn-danger" name="daftar">Ulang</button>
                </center>
        </div>
        </form>
    </div>
</div>
</div>

<?= $this->endSection(); ?>