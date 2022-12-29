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
            <?= form_open('jadwal/simpanjadwal', ['class' => 'formtambah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">

                <div class="form-group">
                    <label>Gelombang</label>
                    <input type="text" class="form-control" id="gelombang_id" name="gelombang_id">
                    <div class="invalid-feedback errorGelombang">
                    </div>
                </div>

                <div class="form-group">
                    <label>Tanggal Ujian</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="mdi mdi-calendar"></i>
                        </div>
                        <input type="text" class="form-control" id="tanggal_ujian" name="tanggal_ujian">
                        <div class="invalid-feedback errorTanggal">
                    </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Jam Ujian</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="mdi mdi-clock"></i>
                        </div>
                        <input type="text" class="form-control" id="jam_ujian" name="jam_ujian">
                        <div class="invalid-feedback errorJam">
                    </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Durasi Ujian</label>
                    <input type="text" class="form-control" id="durasi_ujian" name="durasi_ujian" placeholder="Menit">
                    <div class="invalid-feedback errorDurasi">
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

        $('#datepicker').datepicker({
            autoclose: true,
            todayHighlight: false,
            orientation: "bottom auto",
            format: 'yyyy-mm-dd'
        });
        $('#tanggal_ujian').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
       
        $('#jam_ujian').timepicker({
            showInputs: false,
            showMeridian: false
        });

        $('.formtambah').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: {
                    gelombang_id: $('input#gelombang_id').val(),
                    tanggal_ujian: $('input#tanggal_ujian').val(),
                    jam_ujian: $('input#jam_ujian').val(),
                    durasi_ujian: $('input#durasi_ujian').val(),
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
                        if (response.error.gelombang_id) {
                            $('#gelombang_id').addClass('is-invalid');
                            $('.errorGelombang').html(response.error.gelombang_id);
                        } else {
                            $('#gelombang_id').removeClass('is-invalid');
                            $('.errorGelombang').html('');
                        }
                        if (response.error.tanggal_ujian) {
                            $('#tanggal_ujian').addClass('is-invalid');
                            $('.errorTanggal').html(response.error.tanggal_ujian);
                        } else {
                            $('#tanggal_ujian').removeClass('is-invalid');
                            $('.errorTanggal').html('');
                        }
                        if (response.error.jam_ujian) {
                            $('#jam_ujian').addClass('is-invalid');
                            $('.errorJam').html(response.error.jam_ujian);
                        } else {
                            $('#jam_ujian').removeClass('is-invalid');
                            $('.errorJam').html('');
                        }
                        if (response.error.durasi_ujian) {
                            $('#durasi_ujian').addClass('is-invalid');
                            $('.errorDurasi').html(response.error.durasi_ujian);
                        } else {
                            $('#durasi_ujian').removeClass('is-invalid');
                            $('.errorDurasi').html('');
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
                        listjadwal();
                    }
                }
            });
        })
    });
</script>