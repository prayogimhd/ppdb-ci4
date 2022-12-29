<?php

use App\Models\Modelkonfigurasi;

$this->konfigurasi = new Modelkonfigurasi();
$konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Pendaftaran - <?= $konfigurasi['nama_web'] ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="html.design">
    <link rel="shortcut icon" href="<?= base_url('img/konfigurasi/icon/' . $konfigurasi['icon']) ?>">
    <!-- description -->
    <meta name="description" content="Wizard Form with Validation - Responsive">
    <link rel="shortcut icon" href="<?= base_url('assets/ppdb') ?>/images/favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/ppdb') ?>/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css">
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700" rel="stylesheet">
    <!-- Reset CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/ppdb') ?>/css/reset.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/ppdb') ?>/css/style.css">
    <!-- Responsive  CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/ppdb') ?>/css/responsive.css">
</head>

<body>

    <div class="wizard-main">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title-wb">Penerimaan Peserta Didik Baru</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 banner-sec">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block img-fluid" src="<?= base_url('assets/ppdb') ?>/images/slider-03.jpg" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>PPDB <br> <?= $konfigurasi['nama_web'] ?></h2>
                                        <p>
                                        Selamat Datang Peserta Didik Baru di PPDB SMK Jujutsu 2
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="<?= base_url('assets/ppdb') ?>/images/slider-01.jpg" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>PPDB <br> <?= $konfigurasi['nama_web'] ?></h2>
                                        <p>
                                        Silahkan melengkapi data pada form pendaftaran dengan benar.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="<?= base_url('assets/ppdb') ?>/images/hubungi.png" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>PPDB <br> <?= $konfigurasi['nama_web'] ?></h2>
                                        <p>
                                        Apabila peserta didik Baru mengalami kesulitan dalam melaksanakan pendaftaran silahkan hubungi Admin <?= $konfigurasi['whatsapp'] ?> (WA)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 login-sec">
                    <div class="login-sec-bg">
                        <h2 class="text-center">Formulir Pendaftar</h2>
                        <form id="example-advanced-form" action="<?= base_url('ppdb/simpan') ?>" class="formtambah" style="display: none;">
                            <?= csrf_field(); ?>
                            <h3>Profile</h3>
                            <fieldset class="form-input">
                                <h4>Informasi pendaftar</h4>
                                <label for="nisn">Nisn *</label>
                                <input id="nisn" name="nisn" type="text" class="form-control required">
                                <div class="invalid-feedback errorNisn">
                                </div>

                                <label for="nama_lengkap">Nama Lengkap *</label>
                                <input id="nama_lengkap" name="nama_lengkap" type="text" class="form-control required">

                                <label for="tgl_lahir">Tanggal Lahir*</label>
                                <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control required">

                                <label for="tmp_lahir">Tempat Lahir*</label>
                                <input id="tmp_lahir" name="tmp_lahir" type="text" class="form-control required">

                                <label for="jenkel">Jenis Kelamin *</label>
                                <select name="jenkel" id="jenkel" class="form-control required">
                                    <option Disabled=true Selected=true>Pilih</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select> <br>
                                <small class="pull-right">
                                    <a href="<?= base_url('ppdb/login') ?>" class="text-dark">Sudah mendaftar?</a>
                                </small>


                            </fieldset>

                            <h3>Detail</h3>
                            <fieldset class="form-input">
                                <h4></h4>
                                <label for="agama">Agama *</label>
                                <select name="agama" id="agama" class="form-control required">
                                    <option Disabled=true Selected=true>Pilih</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Kong Hu Cu">Kong Hu Cu</option>
                                </select>

                                <label for="nama_ayah">Nama Ayah *</label>
                                <input id="nama_ayah" name="nama_ayah" type="text" class="form-control required">

                                <label for="nama_ibu">Nama Ibu *</label>
                                <input id="nama_ibu" name="nama_ibu" type="text" class="form-control required">

                                <label for="alamat">Alamat*</label>
                                <input id="alamat" name="alamat" type="text" class="form-control required">

                                <label for="jenis_tinggal">Jenis Tinggal *</label>
                                <select name="jenis_tinggal" id="jenis_tinggal" class="form-control required">
                                    <option Disabled=true Selected=true>Pilih</option>
                                    <option value="Bersama Orangtua">Bersama Orangtua</option>
                                    <option value="Bersama Saudara">Bersama Saudara</option>
                                    <option value="Kos">Kos</option>
                                </select>

                            </fieldset>

                            <h3>Finish</h3>
                            <fieldset class="form-input">
                                <small class="text-danger">*Jika gagal submit maka cek kembali data anda!</small><br><br>

                                <label for="asal_sekolah">Asal Sekolah*</label>
                                <input id="asal_sekolah" name="asal_sekolah" type="text" class="form-control required">

                                <label for="transportasi">Transportasi ke Sekolah *</label>
                                <select name="transportasi" id="transportasi" class="form-control required">
                                    <option Disabled=true Selected=true>Pilih</option>
                                    <option value="Mobil">Mobil</option>
                                    <option value="Motor">Motor</option>
                                    <option value="Jalan Kaki">Jalan Kaki</option>
                                </select><br>

                                <label for="no_telp">No telp / WA*</label>
                                <input id="no_telp" name="no_telp" type="text" class="form-control required" onkeypress="return hanyaAngka(event)">

                                <label for="jurusan">Jurusan *</label>
                                <select name="jurusan" id="jurusan" class="form-control required">
                                    <option Disabled=true Selected=true>Pilih</option>
                                    <option value="IPA">IPA</option>
                                    <option value="IPS">IPS</option>
                                </select><br>
                                <label></label><br>
                                <input id="acceptTerms-2" name="acceptTerms" type="checkbox" class="required"> 
                                <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright text-center">All Rights Reserved. &copy; 2022 <a href="https://smapgri2plg.sch.id/"><?= $konfigurasi['nama_web'] ?></a> 
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery latest version -->
    <script src="<?= base_url('assets/ppdb') ?>/js/jquery.min.js"></script>
    <!-- popper.min.js -->
    <script src="<?= base_url('assets/ppdb') ?>/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="<?= base_url('assets/ppdb') ?>/js/bootstrap.min.js"></script>
    <!-- jquery.steps js -->
    <script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js'></script>
    <script src="<?= base_url('assets/ppdb') ?>/js/jquery.steps.js"></script>
    <!-- particles js -->
    <script src="<?= base_url('assets/ppdb') ?>/js/particles.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            particlesJS("particles-js", {
                "particles": {
                    "number": {
                        "value": 160,
                        "density": {
                            "enable": true,
                            "value_area": 800
                        }
                    },
                    "color": {
                        "value": "#ffffff"
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "#000000"
                        },
                        "polygon": {
                            "nb_sides": 5
                        },
                        "image": {
                            "src": "img/github.svg",
                            "width": 100,
                            "height": 100
                        }
                    },
                    "opacity": {
                        "value": 1,
                        "random": true,
                        "anim": {
                            "enable": true,
                            "speed": 1,
                            "opacity_min": 0,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 3,
                        "random": true,
                        "anim": {
                            "enable": false,
                            "speed": 4,
                            "size_min": 0.3,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": false,
                        "distance": 150,
                        "color": "#ffffff",
                        "opacity": 0.4,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 1,
                        "direction": "none",
                        "random": true,
                        "straight": false,
                        "out_mode": "out",
                        "bounce": false,
                        "attract": {
                            "enable": false,
                            "rotateX": 600,
                            "rotateY": 600
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "bubble"
                        },
                        "onclick": {
                            "enable": true,
                            "mode": "repulse"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 400,
                            "line_linked": {
                                "opacity": 1
                            }
                        },
                        "bubble": {
                            "distance": 250,
                            "size": 0,
                            "duration": 2,
                            "opacity": 0,
                            "speed": 3
                        },
                        "repulse": {
                            "distance": 400,
                            "duration": 0.4
                        },
                        "push": {
                            "particles_nb": 4
                        },
                        "remove": {
                            "particles_nb": 2
                        }
                    }
                },
                "retina_detect": true
            });
        });
    </script>

    <script>
        function hanyaAngka(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
        }
        const date = '<?= date('Y-m-d') ?>'

        var form = $("#example-advanced-form").show();

        form.steps({
            headerTag: "h3",
            bodyTag: "fieldset",
            transitionEffect: "slideLeft",
            onStepChanging: function(event, currentIndex, newIndex) {
                // Allways allow previous action even if the current form is not valid!
                if (currentIndex > newIndex) {
                    return true;
                }
                // Forbid next action on "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age").val()) < 18) {
                    return false;
                }
                // Needed in some cases if the user went back (clean up)
                if (currentIndex < newIndex) {
                    // To remove error styles
                    form.find(".body:eq(" + newIndex + ") label.error").remove();
                    form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                }
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onStepChanged: function(event, currentIndex, priorIndex) {
                // Used to skip the "Warning" step if the user is old enough.
                if (currentIndex === 2 && Number($("#age").val()) >= 18) {
                    form.steps("next");
                }
                // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3) {
                    form.steps("previous");
                }
            },
            onFinishing: function(event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function(event, currentIndex) {
                event.preventDefault();
                $.ajax({
                    type: "post",
                    url: '<?= site_url('ppdb/simpan') ?>',
                    data: {
                        nisn: $('input#nisn').val(),
                        password: $('input#nisn').val(),
                        nama_lengkap: $('input#nama_lengkap').val(),
                        tgl_lahir: $('input#tgl_lahir').val(),
                        tmp_lahir: $('input#tmp_lahir').val(),
                        jenkel: $('select#jenkel').val(),
                        agama: $('select#agama').val(),
                        nama_ayah: $('input#nama_ayah').val(),
                        nama_ibu: $('input#nama_ibu').val(),
                        alamat: $('input#alamat').val(),
                        jenis_tinggal: $('select#jenis_tinggal').val(),
                        asal_sekolah: $('input#asal_sekolah').val(),
                        transportasi: $('select#transportasi').val(),
                        no_telp: $('input#no_telp').val(),
                        jurusan: $('select#jurusan').val(),
                        foto_siswa: 'default.png',
                        foto_ijazah: 'default.png',
                        bukti_pembayaran: 'default.png',
                        tgl_daftar: date,
                        status: 'Proses'
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.error) {
                            if (response.error.nisn) {
                                $('#nisn').addClass('is-invalid');
                                $('.errorNisn').html(response.error.nisn);
                            } else {
                                $('#nisn').removeClass('is-invalid');
                                $('.errorNisn').html('');
                            }
                        } else {
                            Swal.fire({
                                title: "Berhasil!",
                                text: response.sukses,
                                icon: "success",
                                showConfirmButton: false,
                                timer: 2500
                            }).then(function() {
                                window.location = 'ppdb/login';
                            });
                            console.log(response);
                        }
                    }
                });
            }

        }).validate({
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>