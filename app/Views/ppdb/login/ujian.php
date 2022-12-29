<?= $this->extend('ppdb/layout/script') ?>

<?= $this->section('judul') ?>
<div class="col-sm-6">
    <h4 class="page-title">Ujian</h4>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-right">
        <div id="clock"></div>
    </ol>
</div>
<style>
    #timer_place {
        margin: 0 auto;
        text-align: center;
    }

    #counter {
        border-radius: 7px;
        border: 2px solid gray;
        padding: 7px;
        font-size: 2em;
        font-weight: bolder;
    }
</style>
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
<?php

if (isset($_SESSION["waktu_start"])) {
    $lewat = time() - $_SESSION["waktu_start"];
    // $lewat = time() - strtotime($jam_ujian);
} else {
    $_SESSION["waktu_start"] = time();
    $lewat = 0;
}

?>

<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
<center>
    <div class="row">
        <div class="col-md-3">
            <div class="box box-success">
                <div class="box-header text-center">
                    <h4 class="box-title">Waktu Ujian</h4>
                </div>
                <div class="box-body" id="timer_place">
                    <span id="counter" align="center"></span>
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <center>
                        <h3 class="box-title">Soal Ujian</h3>
                    </center>
                </div><!-- /.box-header -->
                <div class="box-body" style="overflow-y: scroll;height: 525px;">
                    <form id="formSoal" role="form" action="<?= base_url('ppdb/jawab'); ?>" method="post" onsubmit="return confirm('Apakah anda sudah yakin dengan jawaban anda ?')">

                        <input type="hidden" name="jumlah_soal" value="<?= $total_soal ?>">
                        <h6>Selamat Mengerjakan! </h6>
                        <?php $no = 0;
                        foreach ($soal_ujian as $s) {
                            $no++ ?>
                            <div class="form-group">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <td width="1%"><?php echo $no; ?>.</td>
                                            <td><small><?= $s['nama_kategori'] ?></small> <br> <?php echo $s['pertanyaan']; ?>
                                                <input type='hidden' name='soal[]' value='<?php echo $s['id_soal_ujian']; ?>' /> <br>
                                                <input type="radio" name="jawaban[<?php echo $s['id_soal_ujian']; ?>]" value="A" required id="mesmew" /> <?php echo $s['a']; ?><br>
                                                <input type="radio" name="jawaban[<?php echo $s['id_soal_ujian']; ?>]" value="B" required id="mesmew" /> <?php echo $s['b']; ?><br>
                                                <input type="radio" name="jawaban[<?php echo $s['id_soal_ujian']; ?>]" value="C" required id="mesmew" /> <?php echo $s['c']; ?><br>
                                                <input type="radio" name="jawaban[<?php echo $s['id_soal_ujian']; ?>]" value="D" required id="mesmew" /> <?php echo $s['d']; ?><br>
                                                <input type="radio" name="jawaban[<?php echo $s['id_soal_ujian']; ?>]" value="E" required id="mesmew" /> <?php echo $s['e']; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        <?php } ?>
                        <button type="submit" class="btn btn-primary btn-flat pull-right">Simpan</button>
                    </form>
                    <div class="box-footer">

                    </div>
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>
</center>
<script type="text/javascript">
    function waktuHabis() {
        alert('Waktu Anda telah habis, Jawaban anda akan disimpan secara otomatis.');
        var formSoal = document.getElementById("formSoal");
        formSoal.submit();
    }

    function hampirHabis(periods) {
        if ($.countdown.periodsToSeconds(periods) == 60) {
            $(this).css({
                color: "red"
            });
        }
    }
    $(function() {
        var waktu = '<?= $max_time; ?>';
        var sisa_waktu = waktu - <?= $lewat ?>;
        var longWayOff = sisa_waktu;
        console.log(<?= $lewat ?>);
        $("#counter").countdown({
            until: longWayOff,
            compact: true,
            onExpiry: waktuHabis,
            onTick: hampirHabis
        });
    });
</script>
<?= $this->endSection('isi') ?>