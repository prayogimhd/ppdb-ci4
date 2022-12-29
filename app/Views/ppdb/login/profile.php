<?= $this->extend('ppdb/layout/script') ?>

<?= $this->section('judul') ?>
<div class="col-sm-6">
    <h4 class="page-title">Profile</h4>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-right">
        <div id="clock"></div>
    </ol>
</div>
<script type="text/javascript">
    function showTime() {
        var a_p = "";
        var today = new Date();
        var curr_hour = today.getHours();
        var curr_minute = today.getMinutes();
        var curr_second = today.getSeconds();
        if (curr_hour < 12) {
            a_p = "AM";
        } else {
            a_p = "PM";
        }
        if (curr_hour == 0) {
            curr_hour = 12;
        }
        if (curr_hour > 12) {
            curr_hour = curr_hour - 12;
        }
        curr_hour = checkTime(curr_hour);
        curr_minute = checkTime(curr_minute);
        curr_second = checkTime(curr_second);
        document.getElementById('clock').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(showTime, 500);
</script>
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button> <i class="mdi mdi-account-multiple-outline"></i>
    <strong>Selamat datang!</strong> <?= esc($nama_lengkap) ?>.
</div>

<div class="viewmodal">
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <?= form_open('ppdb/editprofile', ['class' => 'formedit']) ?>
            <div class="card-body">

                <?php
                if ($nama_panggilan == null || $kewarganegaraan == null || $jarak_tempuh == null || $anak_keberapa == null || $jumlah_kandung == null || $jumlah_angkat == null || $jumlah_tiri == null || $yatim_piatu == null || $penyakit_diderita == null || $kelainan_jasmani == null || $bahasa == null || $golongan_darah == null || $tinggi_berat == null) { ?>
                    <div class="alert alert-danger" role="alert">
                        Mohon untuk melengkapi data!
                    </div>

                <?php } elseif ($status_pembayaran != 1) { ?>
                    <div class="alert alert-danger" role="alert">
                        Mohon untuk melakukan <strong>pembayaran</strong>, agar data segera diproses!<br>
                        <?= $nomor_rekening ?> (<?= $nama_rekening ?>)
                    </div>

                <?php } elseif ($status_pembayaran == 1 && $foto_siswa == 'default.png') { ?>
                    <div class="alert alert-secondary" role="alert">
                        Mohon <strong>upload</strong> pas foto!
                    </div>

                <?php } elseif ($status_pembayaran == 1 && $foto_ijazah == 'default.png') { ?>
                    <div class="alert alert-secondary" role="alert">
                        Mohon <strong>upload</strong> scan ijazah!
                    </div>

                <?php } else { ?>

                    <?php if ($status == 'Proses') { ?>
                        <div class="alert alert-secondary" role="alert">
                            Kamu akan mulai <strong>UJIAN</strong>, pada hari <?= longdate_indo($tanggal_ujian) ?>, Jam <?= $jam_ujian ?> WIB - Selesai <br>
                            <?php
                            if (Date('d-m-Y', strtotime($tanggal_ujian)) == Date('d-m-Y') && Date('H:i:s', strtotime($jam_ujian)) <= Date('H:i:s')) {
                                echo "<a href='" . 'ujian/' . "' class='btn btn-xs btn-primary';'>Mulai Ujian</a>";
                            } else if (strtotime($tanggal_ujian) >= strtotime(date('d-m-Y'))) {
                                echo "<span class='badge badge-primary'>Tuggu Waktu Ujian</span>";
                            } else {
                                echo "<span class='badge badge-danger'>Waktu Ujian telah berakhir</span>";
                            }
                            ?>
                        </div>
                    <?php } elseif ($status == 'Lulus') { ?>
                        <div class="alert alert-success" role="alert">
                            Selamat kamu <strong>Lulus</strong> seleksi, silahkan cek <a href="<?= base_url() ?>" style="color: #FFD700">DISINI</a> & <a href="/file/gelombang/<?= $gelombang ?>" target="_blank" style="color: #FFD700"><i> PDF Pengumuman Gelombang <?= $nama_gelombang ?></i></a> <br> Silahkan <a href="cetak" target="_blank" style="color: #FFD700"><i>cetak data</i></a> ! <br>
                            <small>*Jangan lupa bawa hasil cetak ke sekolah.</small>
                        </div>

                    <?php } elseif ($status == 'Tes') { ?>
                        <div class="alert alert-primary" role="alert">
                            Kamu sedang proses <strong>UJIAN</strong>
                        </div>
                    <?php } else { ?>
                        <div class="alert alert-danger" role="alert">
                            Maaf kamu <strong>Tidak Lulus</strong> seleksi!
                        </div>
                    <?php }
                    ?>

                <?php } ?>


                <i class="mdi mdi-circle-edit-outline"></i> Biodata <br>
                <small>*Mohon cek kembali data & pastikan sudah benar.</small><br>
                <?php if ($foto_ijazah == 'default.png' || $foto_siswa == 'default.png') { ?>
                    <small>*Silahkan upload foto & scan ijazahnya ya!.</small>
                <?php } ?>
                <input type="hidden" class="form-control" id="ppdb_id" value="<?= $ppdb_id ?>" name="ppdb_id" readonly>
                <hr>
                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-account-badge"></i>
                            Nisn
                        </label>
                        <input type="text" id="nisn" name="nisn" value="<?= esc($nisn) ?>" class="form-control" readonly>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-alpha-j-circle-outline"></i>
                            Jurusan
                        </label>
                        <input type="text" id="jurusan" name="jurusan" value="<?= esc($jurusan) ?>" class="form-control" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-tooltip-account"></i>
                            Nama Lengkap
                        </label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= esc($nama_lengkap) ?>" class="form-control">
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-tooltip-account"></i>
                            Nama Panggilan
                        </label>
                        <input type="text" id="nama_panggilan" name="nama_panggilan" value="<?= esc($nama_panggilan) ?>" class="form-control">
                        <div class="invalid-feedback errorNamapanggilan">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-tooltip-account"></i>
                            Kewarganegaraan
                        </label>
                        <input type="text" id="kewarganegaraan" name="kewarganegaraan" value="<?= esc($kewarganegaraan) ?>" class="form-control">
                        <div class="invalid-feedback errorKewarganegaraan">
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-account-multiple-outline"></i>
                            Jenis Kelamin
                        </label>
                        <select name="jenkel" id="jenkel" class="form-control">
                            <option value="Laki-Laki" <?php if ($jenkel == 'Laki-Laki') echo "selected"; ?>>Laki-Laki</option>
                            <option value="Perempuan" <?php if ($jenkel == 'Perempuan') echo "selected"; ?>>Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-google-maps"></i>
                            Alamat
                        </label>
                        <textarea type="text" id="alamat" name="alamat" class="form-control"><?= esc($alamat) ?></textarea>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-map-marker-radius"></i>
                            Jenis Tinggal
                        </label>
                        <select name="jenis_tinggal" id="jenis_tinggal" class="form-control">
                            <option value="Bersama Orangtua" <?php if ($jenis_tinggal == 'Bersama Orangtua') echo "selected"; ?>>Bersama Orangtua</option>
                            <option value="Bersama Saudara" <?php if ($jenis_tinggal == 'Bersama Saudara') echo "selected"; ?>>Bersama Saudara</option>
                            <option value="Kos" <?php if ($jenis_tinggal == 'Kos') echo "selected"; ?>>Kos</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-car"></i>
                            Jarak Tempuh
                        </label>
                        <input type="text" id="jarak_tempuh" name="jarak_tempuh" value="<?= esc($jarak_tempuh) ?>" class="form-control">
                        <div class="invalid-feedback errorJaraktempuh">
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-train-car"></i>
                            Transportasi ke Sekolah
                        </label>
                        <select name="transportasi" id="transportasi" class="form-control">
                            <option value="Mobil" <?php if ($transportasi == 'Mobil') echo "selected"; ?>>Mobil</option>
                            <option value="Motor" <?php if ($transportasi == 'Motor') echo "selected"; ?>>Motor</option>
                            <option value="Jalan Kaki" <?php if ($transportasi == 'Jalan Kaki') echo "selected"; ?>>Jalan Kaki</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-office-building"></i>
                            Asal Sekolah
                        </label>
                        <input type="text" id="asal_sekolah" name="asal_sekolah" value="<?= esc($asal_sekolah) ?>" class="form-control">
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-whatsapp"></i>
                            No Telp
                        </label>
                        <input type="text" id="no_telp" name="no_telp" value="<?= esc($no_telp) ?>" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-timetable"></i>
                            Tanggal Lahir
                        </label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir" value="<?= esc($tgl_lahir) ?>" class="form-control">
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-hospital-building"></i>
                            Tempat Lahir
                        </label>
                        <input type="text" id="tmp_lahir" name="tmp_lahir" value="<?= esc($tmp_lahir) ?>" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-account-heart-outline"></i>
                            Nama Ayah
                        </label>
                        <input type="text" id="nama_ayah" name="nama_ayah" value="<?= esc($nama_ayah) ?>" class="form-control">
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-account-heart-outline"></i>
                            Nama Ibu
                        </label>
                        <input type="text" id="nama_ibu" name="nama_ibu" value="<?= esc($nama_ibu) ?>" class="form-control">
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-account-heart-outline"></i>
                            Anak Keberapa
                        </label>
                        <input type="text" id="anak_keberapa" name="anak_keberapa" value="<?= esc($anak_keberapa) ?>" class="form-control">
                        <div class="invalid-feedback errorAnakkeberapa">
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-account-heart-outline"></i>
                            Jumlah Saudara Kandung
                        </label>
                        <input type="text" id="jumlah_kandung" name="jumlah_kandung" value="<?= esc($jumlah_kandung) ?>" class="form-control">
                        <div class="invalid-feedback errorJumlahkandung">
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-account-heart-outline"></i>
                            Jumlah Saudara Tiri
                        </label> <small>* Isi dengan - jika data kosong</small>
                        <input type="text" id="jumlah_tiri" name="jumlah_tiri" value="<?= esc($jumlah_tiri) ?>" class="form-control">
                        <div class="invalid-feedback errorJumlahtiri">
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-account-heart-outline"></i>
                            Jumlah Saudara Angkat
                        </label> <small>* Isi dengan - jika data kosong</small>
                        <input type="text" id="jumlah_angkat" name="jumlah_kandung" value="<?= esc($jumlah_angkat) ?>" class="form-control">
                        <div class="invalid-feedback errorJumlahangkat">
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-shield-check-outline"></i>
                            Agama
                        </label>
                        <select name="agama" id="agama" class="form-control">
                            <option value="Islam" <?php if ($agama == 'Islam') echo "selected"; ?>>Islam</option>
                            <option value="Kristen Protestan" <?php if ($agama == 'Kristen Protestan') echo "selected"; ?>>Kristen Protestan</option>
                            <option value="Katolik" <?php if ($agama == 'Katolik') echo "selected"; ?>>Katolik</option>
                            <option value="Hindu" <?php if ($agama == 'Hindu') echo "selected"; ?>>Hindu</option>
                            <option value="Buddha" <?php if ($agama == 'Buddha') echo "selected"; ?>>Buddha</option>
                            <option value="Kong Hu Cu" <?php if ($agama == 'Kong Hu Cu') echo "selected"; ?>>Kong Hu Cu</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-account-heart-outline"></i>
                            Anak Yatim/Piatu
                        </label> <small>* Isi dengan - jika data kosong</small>
                        <input type="text" id="yatim_piatu" name="yatim_piatu" value="<?= esc($yatim_piatu) ?>" class="form-control">
                        <div class="invalid-feedback errorYatimpiatu">
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-account-convert"></i>
                            Penyakit yang pernah di derita
                        </label>
                        <input type="text" id="penyakit_diderita" name="penyakit_diderita" value="<?= esc($penyakit_diderita) ?>" class="form-control">
                        <div class="invalid-feedback errorPenyakitdiderita">
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-account-network"></i>
                            Kelainan Jasmani
                        </label> <small>* Isi dengan - jika data kosong</small>
                        <input type="text" id="kelainan_jasmani" name="kelainan_jasmani" value="<?= esc($kelainan_jasmani) ?>" class="form-control">
                        <div class="invalid-feedback errorKelainanjasmani">
                        </div>
                    </div>

                    <div class="form-group col-md-4 col-12">
                        <label> <i class="mdi mdi-keyboard-close"></i>
                            Bahasa sehari-hari
                        </label>
                        <input type="text" id="bahasa" name="bahasa" value="<?= esc($bahasa) ?>" class="form-control">
                        <div class="invalid-feedback errorBahasa">
                        </div>
                    </div>

                    <div class="form-group col-md-4 col-12">
                        <label> <i class="mdi mdi-account-search"></i>
                            Gol darah
                        </label>
                        <input type="text" id="golongan_darah" name="golongan_darah" value="<?= esc($golongan_darah) ?>" class="form-control">
                        <div class="invalid-feedback errorGolongandarah">
                        </div>
                    </div>

                    <div class="form-group col-md-4 col-12">
                        <label> <i class="mdi mdi-account-settings"></i>
                            Tinggi & Berat badan
                        </label>
                        <input type="text" id="tinggi_berat" name="tinggi_berat" value="<?= esc($tinggi_berat) ?>" class="form-control">
                        <div class="invalid-feedback errorTinggiberat">
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-12">
                        <center>
                            <i class="mdi mdi-wallpaper"></i> Bukti Pembayaran <br>
                            <small>*Klik foto untuk meng-upload bukti pembayaran.</small>
                        </center>
                        <hr>
                        <div class="form-group text-center">
                            <img class="img-thumbnail" onclick="buktipembayaran('<?= $ppdb_id ?>')" src="<?= site_url('img/ppdb/bukti_pembayaran/'  . $bukti_pembayaran) ?>" width="40%" alt="Scan Ijazah">
                        </div>
                    </div>
                </div>
                <center>
                    <button class="btn btn-primary btnsimpan"><i class="mdi mdi-content-save-all"></i> Update</button>
                </center>
            </div>
            <?= form_close() ?>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-body">
                <i class="mdi mdi-account-convert"></i> Foto <br>
                <small>*Klik foto untuk mengganti foto.</small>
                <hr>
                <div class="form-group text-center">
                    <img onclick="fotosiswa('<?= $ppdb_id ?>')" src="<?= site_url('img/ppdb/' . $foto_siswa) ?>" width="250px" height="250px" alt="Foto Peserta PPDB">
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <i class="mdi mdi-wallpaper"></i> Scan Ijazah <br>
                <small>*Klik foto untuk upload ijazah.</small>
                <hr>
                <div class="form-group text-center">
                    <img class="img-thumbnail" onclick="fotoijazah('<?= $ppdb_id ?>')" src="<?= site_url('img/ppdb/ijazah/'  . $foto_ijazah) ?>" width="65%" alt="Scan Ijazah">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.formedit').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: {
                ppdb_id: $('input#ppdb_id').val(),
                nisn: $('input#nisn').val(),
                jurusan: $('input#jurusan').val(),
                nama_lengkap: $('input#nama_lengkap').val(),
                nama_panggilan: $('input#nama_panggilan').val(),
                kewarganegaraan: $('input#kewarganegaraan').val(),
                jenkel: $('select#jenkel').val(),
                alamat: $('textarea#alamat').val(),
                asal_sekolah: $('input#asal_sekolah').val(),
                no_telp: $('input#no_telp').val(),
                jenis_tinggal: $('select#jenis_tinggal').val(),
                agama: $('select#agama').val(),
                jarak_tempuh: $('input#jarak_tempuh').val(),
                transportasi: $('select#transportasi').val(),
                tgl_lahir: $('input#tgl_lahir').val(),
                tmp_lahir: $('input#tmp_lahir').val(),
                nama_ayah: $('input#nama_ayah').val(),
                nama_ibu: $('input#nama_ibu').val(),
                anak_keberapa: $('input#anak_keberapa').val(),
                jumlah_kandung: $('input#jumlah_kandung').val(),
                jumlah_tiri: $('input#jumlah_tiri').val(),
                jumlah_angkat: $('input#jumlah_angkat').val(),
                yatim_piatu: $('input#yatim_piatu').val(),
                penyakit_diderita: $('input#penyakit_diderita').val(),
                kelainan_jasmani: $('input#kelainan_jasmani').val(),
                bahasa: $('input#bahasa').val(),
                golongan_darah: $('input#golongan_darah').val(),
                tinggi_berat: $('input#tinggi_berat').val(),
            },
            dataType: "json",
            beforeSend: function() {
                $('.btnsimpan').attr('disable', 'disable');
                $('.btnsimpan').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <i>Loading...</i>');
            },
            complete: function() {
                $('.btnsimpan').removeAttr('disable', 'disable');
                $('.btnsimpan').html('<i class="mdi mdi-content-save-all"></i> Update');
            },
            success: function(response) {
                if (response.error) {
                    if (response.error.nisn) {
                        $('#nisn').addClass('is-invalid');
                        $('.errorNisn').html(response.error.nisn);
                    } else {
                        $('#nisn').removeClass('is-invalid');
                        $('.errorNisn').html('');
                    }
                    if (response.error.nama_panggilan) {
                        $('#nama_panggilan').addClass('is-invalid');
                        $('.errorNamapanggilan').html(response.error.nama_panggilan);
                    } else {
                        $('#nama_panggilan').removeClass('is-invalid');
                        $('.errorNamapanggilan').html('');
                    }
                    if (response.error.kewarganegaraan) {
                        $('#kewarganegaraan').addClass('is-invalid');
                        $('.errorKewarganegaraan').html(response.error.kewarganegaraan);
                    } else {
                        $('#kewarganegaraan').removeClass('is-invalid');
                        $('.errorKewarganegaraan').html('');
                    }
                    if (response.error.jarak_tempuh) {
                        $('#jarak_tempuh').addClass('is-invalid');
                        $('.errorJaraktempuh').html(response.error.jarak_tempuh);
                    } else {
                        $('#jarak_tempuh').removeClass('is-invalid');
                        $('.errorJaraktempuh').html('');
                    }
                    if (response.error.anak_keberapa) {
                        $('#anak_keberapa').addClass('is-invalid');
                        $('.errorAnakkeberapa').html(response.error.anak_keberapa);
                    } else {
                        $('#anak_keberapa').removeClass('is-invalid');
                        $('.errorAnakkeberapa').html('');
                    }
                    if (response.error.jumlah_kandung) {
                        $('#jumlah_kandung').addClass('is-invalid');
                        $('.errorJumlahkandung').html(response.error.jumlah_kandung);
                    } else {
                        $('#jumlah_kandung').removeClass('is-invalid');
                        $('.errorJumlahkandung').html('');
                    }
                    if (response.error.jumlah_tiri) {
                        $('#jumlah_tiri').addClass('is-invalid');
                        $('.errorJumlahtiri').html(response.error.jumlah_tiri);
                    } else {
                        $('#jumlah_tiri').removeClass('is-invalid');
                        $('.errorJumlahtiri').html('');
                    }
                    if (response.error.jumlah_angkat) {
                        $('#jumlah_angkat').addClass('is-invalid');
                        $('.errorJumlahangkat').html(response.error.jumlah_angkat);
                    } else {
                        $('#jumlah_angkat').removeClass('is-invalid');
                        $('.errorJumlahangkat').html('');
                    }
                    if (response.error.yatim_piatu) {
                        $('#yatim_piatu').addClass('is-invalid');
                        $('.errorYatimpiatu').html(response.error.yatim_piatu);
                    } else {
                        $('#yatim_piatu').removeClass('is-invalid');
                        $('.errorYatimpiatu').html('');
                    }
                    if (response.error.penyakit_diderita) {
                        $('#penyakit_diderita').addClass('is-invalid');
                        $('.errorPenyakitdiderita').html(response.error.penyakit_diderita);
                    } else {
                        $('#penyakit_diderita').removeClass('is-invalid');
                        $('.errorPenyakitdiderita').html('');
                    }
                    if (response.error.kelainan_jasmani) {
                        $('#kelainan_jasmani').addClass('is-invalid');
                        $('.errorKelainanjasmani').html(response.error.kelainan_jasmani);
                    } else {
                        $('#kelainan_jasmani').removeClass('is-invalid');
                        $('.errorKelainanjasmani').html('');
                    }
                    if (response.error.bahasa) {
                        $('#bahasa').addClass('is-invalid');
                        $('.errorBahasa').html(response.error.bahasa);
                    } else {
                        $('#bahasa').removeClass('is-invalid');
                        $('.errorBahasa').html('');
                    }
                    if (response.error.golongan_darah) {
                        $('#golongan_darah').addClass('is-invalid');
                        $('.errorGolongandarah').html(response.error.golongan_darah);
                    } else {
                        $('#golongan_darah').removeClass('is-invalid');
                        $('.errorGolongandarah').html('');
                    }
                    if (response.error.tinggi_berat) {
                        $('#tinggi_berat').addClass('is-invalid');
                        $('.errorTinggiberat').html(response.error.tinggi_berat);
                    } else {
                        $('#tinggi_berat').removeClass('is-invalid');
                        $('.errorTinggiberat').html('');
                    }
                } else {
                    Swal.fire({
                        title: "Berhasil!",
                        text: response.sukses,
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location = '';
                    })
                }
            }
        });
    })

    function fotosiswa(ppdb_id) {
        $.ajax({
            type: "post",
            url: "<?= site_url('ppdb/formuploadfoto') ?>",
            data: {
                ppdb_id: ppdb_id
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modalupload').modal('show');

                }
            }
        });
    }

    function fotoijazah(ppdb_id) {
        $.ajax({
            type: "post",
            url: "<?= site_url('ppdb/formuploadijazah') ?>",
            data: {
                ppdb_id: ppdb_id
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modalupload').modal('show');

                }
            }
        });
    }

    function buktipembayaran(ppdb_id) {
        $.ajax({
            type: "post",
            url: "<?= site_url('ppdb/formuploadpembayaran') ?>",
            data: {
                ppdb_id: ppdb_id
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modalupload').modal('show');

                }
            }
        });
    }
</script>
<?= $this->endSection('isi') ?>