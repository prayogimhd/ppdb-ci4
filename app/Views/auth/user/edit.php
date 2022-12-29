<!-- Modal -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('konfigurasi/update', ['class' => 'formedit']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <input type="hidden" class="form-control" id="user_id" value="<?= $user_id ?>" name="user_id" readonly>
                <div class="form-group">
                    <label>Username</label>
                    <?php if ($username != 'admin') {
                    ?>
                        <input type="text" class="form-control" id="username" value="<?= $username ?>" name=" username">
                    <?php } else { ?>
                        <input type="text" class="form-control" id="username" value="<?= $username ?>" name=" username" readonly>
                    <?php } ?>
                    <div class="invalid-feedback errorUser">
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" value="<?= $nama ?>" id="nama" name="nama">
                    <div class="invalid-feedback errorNama">
                    </div>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" value="<?= $email ?>" id="email" name="email">
                    <div class="invalid-feedback errorEmail">
                    </div>
                </div>

                <div class="form-group">
                    <label>Password <br> <small>*Masukkan password baru jika ingin mengganti password.</small></label>
                    <input type="password" class="form-control" id="password" name="password">
                    <div class="invalid-feedback errorPass">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnsimpan"><i class="fa fa-share-square"></i> Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.formedit').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: {
                    user_id: $('input#user_id').val(),
                    username: $('input#username').val(),
                    nama: $('input#nama').val(),
                    email: $('input#email').val(),
                    password: $('input#password').val(),
                },
                dataType: "json",
                beforeSend: function() {
                    $('.btnsimpan').attr('disable', 'disable');
                    $('.btnsimpan').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <i>Loading...</i>');
                },
                complete: function() {
                    $('.btnsimpan').removeAttr('disable', 'disable');
                    $('.btnsimpan').html('<i class="fa fa-share-square"></i>  Simpan');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.username) {
                            $('#username').addClass('is-invalid');
                            $('.errorUser').html(response.error.username);
                        } else {
                            $('#username').removeClass('is-invalid');
                            $('.errorUser').html('');
                        }

                        if (response.error.nama) {
                            $('#nama').addClass('is-invalid');
                            $('.errorNama').html(response.error.nama);
                        } else {
                            $('#nama').removeClass('is-invalid');
                            $('.errorNama').html('');
                        }

                        if (response.error.email) {
                            $('#email').addClass('is-invalid');
                            $('.errorEmail').html(response.error.email);
                        } else {
                            $('#email').removeClass('is-invalid');
                            $('.errorEmail').html('');
                        }

                        if (response.error.password) {
                            $('#password').addClass('is-invalid');
                            $('.errorPass').html(response.error.password);
                        } else {
                            $('#password').removeClass('is-invalid');
                            $('.errorPass').html('');
                        }

                    } else {
                        Swal.fire({
                            title: "Berhasil!",
                            text: response.sukses,
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#modaledit').modal('hide');
                        listuser();
                    }
                }
            });
        })
    });
</script>