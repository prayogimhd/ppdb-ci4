<?php

use App\Models\Modelkonfigurasi;

$this->konfigurasi = new Modelkonfigurasi();
$konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="<?= base_url('img/konfigurasi/icon/' . $konfigurasi['icon']) ?>">

    <link rel="stylesheet" href="<?= base_url('assets/ppdb/login') ?>/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url('assets/ppdb/login') ?>/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/ppdb/login') ?>/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url('assets/ppdb/login') ?>/css/style.css">

    <title>Login PPDB - <?= $konfigurasi['nama_web'] ?></title>
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?= base_url('assets/ppdb/login') ?>/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Sign In</h3>
                                <p class="mb-4 text-secondary">*Isi password menggunakan Nisn.</p>
                                <?php
                                if (session()->getFlashdata('pesan')) {
                                    echo '<center><div class="alert alert-primary alert-dismissible text-center ">';
                                    echo session()->getFlashdata('pesan', '<small>*Silahkan login menggunakan Nisn anda!</small>');
                                    echo '</div></center>';
                                }
                                ?>
                            </div>
                            <?= form_open('ppdb/validasi', ['class' => 'formlogin']) ?>
                            <?= csrf_field() ?>
                            <div class="form-group first">
                                <label for="nisn">Nisn</label>
                                <input type="text" class="form-control" name="nisn" id="nisn">
                                <div class="invalid-feedback errorNisn">
                                </div>
                            </div>
                            <div class="form-group last mb-4">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                                <div class="invalid-feedback errorPassword">
                                </div>
                            </div>

                            <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                    <input type="checkbox" />
                                    <div class="control__indicator"></div>
                                </label>
                                <span class="ml-auto"><a href="<?= site_url('ppdb') ?>" class="forgot-pass">Belum punya akun?</a></span>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary btnlogin">Log In</button>
                            <?= form_close() ?>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/ppdb/login') ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('assets/ppdb/login') ?>/js/popper.min.js"></script>
    <script src="<?= base_url('assets/ppdb/login') ?>/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/ppdb/login') ?>/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            $('.formlogin').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $('.btnlogin').prop('disable', true);
                        $('.btnlogin').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <i>Loading...')

                    },
                    complete: function() {
                        $('.btnlogin').prop('disable', false);
                        $('.btnlogin').html('Login')
                    },
                    success: function(response) {
                        if (response.error) {
                            if (response.error.nisn) {
                                $('#nisn').addClass('is-invalid');
                                $('.errorNisn').html(response.error.nisn);
                            } else {
                                $('#nisn').removeClass('is-invalid');
                                $('#nisn').removeClass('invalid-feedback');
                                $('.errorNisn').html();
                            }

                            if (response.error.password) {
                                $('#password').addClass('is-invalid');
                                $('.errorPassword').html(response.error.password);
                            } else {
                                $('#password').removeClass('is-invalid');
                                $('.errorPassword').html();
                            }
                        }

                        if (response.sukses) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: "Anda berhasil login!",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1250
                            }).then(function() {
                                window.location = response.sukses.link;
                            });

                        }
                    }
                });
                return false;
            });
        });
    </script>
</body>

</html>