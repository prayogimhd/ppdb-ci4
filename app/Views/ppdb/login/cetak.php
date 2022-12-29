<?php

use App\Models\Modelkonfigurasi;

$this->konfigurasi = new Modelkonfigurasi();
$konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="<?= base_url('img/konfigurasi/icon/' . $konfigurasi['icon']) ?>">
    <link href="<?= base_url('assets/ppdb/cetak') ?>/css/media_query.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/ppdb/cetak') ?>/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <script src="<?= base_url('assets/ppdb') ?>/js/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <!-- Modernizr JS -->

</head>
<style>
    .noselect {
        -webkit-touch-callout: none;

        -webkit-user-select: none;

        -khtml-user-select: none;

        -moz-user-select: none;

        -ms-user-select: none;

        user-select: none;

    }
</style>
<style>
    .table-borderless>tbody>tr>td,
    .table-borderless>tbody>tr>th,
    .table-borderless>tfoot>tr>td,
    .table-borderless>tfoot>tr>th,
    .table-borderless>thead>tr>td,
    .table-borderless>thead>tr>th {
        border: none;
    }
</style>
<br>

<body>
    <center><img src="<?= base_url('img/konfigurasi/logo/' . $konfigurasi['logo']) ?>" width="75">
    </center>
    <h5 class="text-center"><?= $konfigurasi['nama_web'] ?></h5>
    <h6 class="text-center"><?= $konfigurasi['alamat'] ?></h6>
    <hr>
    <h6 class="text-center"><u>Penerimaan Peserta Didik Baru</u></h6>
    <h6 class="text-center">TAHUN AJARAN 2022/2023</h6><br>
    <h5 class="text-center">TELAH LULUS SELEKSI</h5>
    <div class="container box">
        <div class="col-lg-12 box">
            <div class="panel panel-default">
                <div class="panel-body noselect">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>Nisn</td>
                                <td>: <?= $nisn ?></td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>: <?= $nama_lengkap ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>: <?= $jenkel ?></td>
                            </tr>
                            <tr>
                                <td>TTL</td>
                                <td>: <?= $tmp_lahir ?>, <?= date_indo($tgl_lahir) ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: <?= $alamat ?></td>
                            </tr>
                            <tr>
                                <td>Asal Sekolah</td>
                                <td>: <?= $asal_sekolah ?></td>
                            </tr>
                            <tr>
                                <td>Jurusan</td>
                                <td>: <?= $jurusan ?></td>
                            </tr>
                            <tr>
                                <td>No Telp</td>
                                <td>: <?= $no_telp ?></td>
                            </tr>
                        </tbody>
                    </table>
                            <small> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Calon siswa di wajibkan untuk datang ke Sekolah untuk menyelesaikan Biaya Administrasi sebesar 3.500.000</small> <br>
                            <small>Berkas yang harus dibawa : <b>Fotocopy Ijazah Legalisir 2 Lembar</b>, <b>Fotocopy SKHU  Legalisir 2 Lembar</b>, <b> Pas Foto berwarna ukuran 3 x 4 sebanyak 3 Lembar</b> & <b>Pas Foto berwarna ukuran 2 x 3 sebanyak 2 Lembar</b>. </small> <br>

                </div>
            </div>
        </div>
    </div>
    <br>
    <p class="text-right">Palembang, <?= date_indo($tgl_daftar) ?>&emsp;&emsp;&emsp;&emsp;&emsp;</p>
    <p class="text-right">Yang Bersangkutan, &emsp;&emsp;&emsp;&emsp;&emsp;</p><br><br><br><br>
    <p class="text-right"><?= $nama_lengkap ?>&emsp;&emsp;&emsp;&emsp;&emsp;</p>
    <br>
    <center>
        <a href="<?= base_url('ppdb/profile') ?>" class="btn btn-primary btn-lg hidden-print"><i class="fa fa-arrow-left"></i> </a>
        <button type="submit" class="btn btn-primary btn-lg hidden-print" onclick="cetak()">Cetak</button><br>
    </center>
</body>
<script>
    $(document).ready(function() {
        window.print();
    });

    function cetak() {

        window.print();
    }
</script>