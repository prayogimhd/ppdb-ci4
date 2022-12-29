<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title ?></title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?= base_url('img/konfigurasi/icon/' . $konfigurasi['icon']) ?>" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url() ?>/assets/frontend/css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">SMK Jujutsu 2</a>
            <a class="btn btn-primary" href="<?= base_url('ppdb') ?>">PPDB</a>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center text-white">
                        <!-- Page heading-->
                        <h1 class="mb-5">Silahkan masukkan NISN!</h1>
                        <?= form_open('home/searchkelulusan') ?>
                        <div class="row">
                            <div class="col">
                                <input class="form-control form-control-lg" id="keyword" type="text" name="keyword" placeholder="NISN" required />
                            </div>
                            <div class="col-auto"><button class="btn btn-primary btn-lg" name="search_submit" type="submit">Submit</button></div>
                        </div>
                        <?= form_close() ?>
                    </div>
                    <br>

                    <?php foreach ($kelulusan as $value) { ?>
                        <?php if ($value['status'] == 'Lulus') { ?>
                            <center>
                                <div class="card text-white bg-primary mb-3 animate-box" style="max-width: 25rem;">
                                    <div class="card-header bg-primary">SELAMAT ANDA DINYATAKAN LULUS!</div>
                                    <div class="card-body">
                                        <h5 class="card-title text-center"><?= $value['nama_lengkap'] ?></h5>
                                        <h6 class="card-title text-center"><?= $value['jurusan'] ?></h6>
                                        <table class="table text-white table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th>Nis </th>
                                                    <td>: <?= $value['nisn'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Asal Sekolah </th>
                                                    <td>: <?= $value['asal_sekolah'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Gelombang </th>
                                                    <td>: <?= $value['gelombang_id'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </center>
                        <?php } elseif ($value['status'] == 'Tes') { ?>
                            <center>
                                <div class="alert alert-warning alert-dismissible fade show col-lg-12" role="alert">
                                    <i class="mdi mdi-account-multiple-outline"></i>
                                    <strong><?= $value['nama_lengkap'] ?></strong><br> Anda masih mengikuti UJIAN TES.
                                </div>
                            </center>
                        <?php } elseif ($value['status'] == 'Proses') { ?>
                            <center>
                                <div class="alert alert-warning alert-dismissible fade show col-lg-12" role="alert">
                                    <i class="mdi mdi-account-multiple-outline"></i>
                                    <strong><?= $value['nama_lengkap'] ?></strong><br> Data anda sedang diproses.
                                </div>
                            </center>
                        <?php } else { ?>
                            <center>
                                <div class="alert alert-danger alert-dismissible fade show col-lg-12" role="alert">
                                    <i class="mdi mdi-account-multiple-outline"></i>
                                    <strong>Maaf!, <?= $value['nama_lengkap'] ?></strong><br> Anda dinyatakan tidak lulus.
                                </div>
                            </center>
                        <?php }
                        ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </header>
    <!-- Footer-->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-4">
                            <a href="<?= $konfigurasi['facebook'] ?>"><i class="bi-facebook fs-3"></i></a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a href="https://wa.me/<?= $konfigurasi['whatsapp'] ?>"><i class="bi-whatsapp fs-3"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="<?= $konfigurasi['instagram'] ?>"><i class="bi-instagram fs-3"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?= base_url() ?>/assets/frontend/js/scripts.js"></script>

    <script>
        function numberOnly(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
        }
    </script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
</body>

</html>