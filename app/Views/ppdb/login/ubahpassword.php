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
<center>
    <div class="card col-md-6">
        <div class="card-body">
            <?= form_open('ppdb/editpassword', ['class' => 'formedit']) ?>
            <i class="mdi mdi-lock"></i>

            Ubah Password
            <br> <small>*Mohon dicatat atau disimpan.</small>
            <input type="hidden" class="form-control" id="ppdb_id" value="<?= $ppdb_id ?>" name="ppdb_id" readonly>
            <?php
            if (session()->getFlashdata('gagal')) {
                echo '<center><div class="alert alert-danger alert-dismissible text-center ">';
                echo session()->getFlashdata('gagal');
                echo '</div></center>';
            }
            if (session()->getFlashdata('success')) {
                echo '<center><div class="alert alert-primary alert-dismissible text-center ">';
                echo session()->getFlashdata('success');
                echo '</div></center>';
            }
            ?>
            <div class="form-group col-12 text-left">
                <label> <i class="mdi mdi-onepassword"></i>
                    Password Lama
                </label>
                <input type="password" id="oldpassword" name="oldpassword" class="form-control">
                <div class="invalid-feedback errorOld">

                </div>
            </div>
            <div class="form-group col-12 text-left">
                <label> <i class="mdi mdi-onepassword"></i>
                    Password Baru
                </label>
                <input type="password" id="password" name="password" class="form-control">
                <div class="invalid-feedback errorPassword">

                </div>
            </div>
            <div class="form-group col-12 text-left">
                <label> <i class="mdi mdi-onepassword"></i>
                    Konfirmasi Password
                </label>
                <input type="password" id="confirm" name="confirm" class="form-control">
                <div class="invalid-feedback errorConfirm">

                </div>
            </div>
            <button class="btn btn-primary btnsimpan"><i class="mdi mdi-content-save-all"></i> Update</button>
            <?= form_close() ?>
        </div>
    </div>
</center>
<script>
    $('.formedit').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: {
                ppdb_id: $('input#ppdb_id').val(),
                oldpassword: $('input#oldpassword').val(),
                password: $('input#password').val(),
                confirm: $('input#confirm').val(),
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
                if (response.respond == 'error') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        html: 'Password salah',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
                if (response.error) {
                    if (response.error.oldpassword) {
                        $('#oldpassword').addClass('is-invalid');
                        $('.errorOld').html(response.error.oldpassword);
                    } else {
                        $('#oldpassword').removeClass('is-invalid');
                        $('.errorOld').html('');
                    }
                    if (response.error.password) {
                        $('#password').addClass('is-invalid');
                        $('.errorPassword').html(response.error.password);
                    } else {
                        $('#password').removeClass('is-invalid');
                        $('.errorPassword').html('');
                    }
                    if (response.error.confirm) {
                        $('#confirm').addClass('is-invalid');
                        $('.errorConfirm').html(response.error.confirm);
                    } else {
                        $('#confirm').removeClass('is-invalid');
                        $('.errorConfirm').html('');
                    }
                } else {
                    window.location = '';
                }
            }
        });
    })
</script>
<?= $this->endSection('isi') ?>