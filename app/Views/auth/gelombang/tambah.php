<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('', ['class' => 'formtambah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Gelombang</label>
                    <input type="text" class="form-control" id="gelombang_id" name="gelombang_id">
                    <div class="invalid-feedback errorGelombang">
                    </div>
                </div>

                <div class="form-group">
                    <label>File</label>
                    <input type="file" class="form-control" id="file_pdf" name="file_pdf">
                    <div class="invalid-feedback errorFile">

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
        $('.btnsimpan').click(function(e) {
            e.preventDefault();
            let form = $('.formtambah')[0];
            let data = new FormData(form);

            $.ajax({
                type: "post",
                // url: $(this).attr('action'),
                url: '<?= site_url('siswa/simpangelombang') ?>',
                data: data,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
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
                        if (response.error.gelombang_id) {
                            $('#gelombang_id').addClass('is-invalid');
                            $('.errorGelombang').html(response.error.gelombang_id);
                        } else {
                            $('#gelombang_id').removeClass('is-invalid');
                            $('.errorGelombang').html('');
                        }

                        if (response.error.file_pdf) {
                            $('#file_pdf').addClass('is-invalid');
                            $('.errorFile').html(response.error.file_pdf);
                        } else {
                            $('#file_pdf').removeClass('is-invalid');
                            $('.errorFile').html('');
                        }
                    } else {
                        Swal.fire({
                            title: "Berhasil!",
                            text: response.sukses,
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#modaltambah').modal('hide');
                        listgelombang();
                    }
                }
            });
        })
    });
</script>