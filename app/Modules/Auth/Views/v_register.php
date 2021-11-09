<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>My Login Page &mdash; Bootstrap 4 Login Page Snippet</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">

                <div class="card-wrapper">
                    <div class="brand">
                        <center>
                            <img src="assets/img/ulm.png" alt="" style="width: 80px;">
                            <br>
                            <h4>Portal Surat FMIPA ULM</h4>
                        </center>
                    </div>
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Register</h4>
                            <form method="POST" action="<?= base_url('/register/simpan') ?>" class="my-login-validation" novalidate="" style="align-items: center;">

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

                                <!-- Konfirmasi Password -->
                                <div class="form-group">
                                    <label for="password">Konfirmasi Password</label>
                                    <input id="password" type="password" class="form-control <?= ($validation->hasError('pass_mhs')) ? 'is-invalid' : ''; ?> " name="confpass" required data-eye>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('confpass') ?>
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Register
                                    </button>
                                </div>

                                <!-- Ke Login -->
                                <div class="mt-4 text-center">
                                    Already have an account? <a href="<?= base_url('login/index') ?>">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer" style="text-align:center">
                        Copyright &copy; 2021 &mdash; RIOT Dev
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/my-login.js"></script>
</body>

</html>