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
            <?= form_open('soal/updatesoal', ['class' => 'formedit']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <input type="hidden" class="form-control" id="id_soal_ujian" value="<?= $id_soal_ujian ?>" name="id_soal_ujian" readonly>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="id_kategori" id="id_kategori" class="form-control">
                        <option Disabled=true Selected=true></option>
                        <?php foreach ($kategori as $key => $data) { ?>
                            <option value="<?= $data['id_kategori'] ?>" <?php if ($data['id_kategori'] == $id_kategori) echo "selected"; ?>><?= $data['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="invalid-feedback errorKategori">
                    </div>
                </div>

                <div class="form-group">
                    <label>Pertanyaan</label>
                    <textarea class="form-control" id="pertanyaan" name="pertanyaan" cols="100" rows="4"><?= $pertanyaan ?> </textarea>
                    <div class="invalid-feedback errorPertanyaan">
                    </div>
                </div>

                <div class="form-group">
                    <label>Jawaban A</label>
                    <input type="text" class="form-control" value="<?= $a ?>" id="a" name="a">
                    <div class="invalid-feedback errorA">
                    </div>
                </div>

                <div class="form-group">
                    <label>Jawaban B</label>
                    <input type="text" class="form-control" value="<?= $b ?>" id="b" name="b">
                    <div class="invalid-feedback errorB">
                    </div>
                </div>

                <div class="form-group">
                    <label>Jawaban C</label>
                    <input type="text" class="form-control" value="<?= $c ?>" id="c" name="c">
                    <div class="invalid-feedback errorC">
                    </div>
                </div>

                <div class="form-group">
                    <label>Jawaban D</label>
                    <input type="text" class="form-control" value="<?= $d ?>" id="d" name="d">
                    <div class="invalid-feedback errorD">
                    </div>
                </div>

                <div class="form-group">
                    <label>Jawaban E</label>
                    <input type="text" class="form-control" value="<?= $e ?>" id="e" name="e">
                    <div class="invalid-feedback errorE">
                    </div>
                </div>

                <div class="form-group">
                    <label>Kunci Jawaban</label>
                    <select name="kunci_jawaban" id="kunci_jawaban" class="form-control">
                        <option value="A" <?php if ($kunci_jawaban == 'A') echo "selected"; ?>>A</option>
                        <option value="B" <?php if ($kunci_jawaban == 'B') echo "selected"; ?>>B</option>
                        <option value="C" <?php if ($kunci_jawaban == 'C') echo "selected"; ?>>C</option>
                        <option value="D" <?php if ($kunci_jawaban == 'D') echo "selected"; ?>>D</option>
                        <option value="E" <?php if ($kunci_jawaban == 'E') echo "selected"; ?>>E</option>
                    </select>
                    <div class="invalid-feedback errorKuncijawaban">
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
                    id_soal_ujian: $('input#id_soal_ujian').val(),
                    id_kategori: $('select#id_kategori').val(),
                    pertanyaan: $('textarea#pertanyaan').val(),
                    a: $('input#a').val(),
                    b: $('input#b').val(),
                    c: $('input#c').val(),
                    d: $('input#d').val(),
                    e: $('input#e').val(),
                    kunci_jawaban: $('select#kunci_jawaban').val(),
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
                        if (response.error.id_kategori) {
                            $('#id_kategori').addClass('is-invalid');
                            $('.errorKategori').html(response.error.id_kategori);
                        } else {
                            $('#id_kategori').removeClass('is-invalid');
                            $('.errorKategori').html('');
                        }
                        if (response.error.pertanyaan) {
                            $('#pertanyaan').addClass('is-invalid');
                            $('.errorPertanyaan').html(response.error.pertanyaan);
                        } else {
                            $('#pertanyaan').removeClass('is-invalid');
                            $('.errorPertanyaan').html('');
                        }
                        if (response.error.a) {
                            $('#a').addClass('is-invalid');
                            $('.errorA').html(response.error.a);
                        } else {
                            $('#id_kategori').removeClass('is-invalid');
                            $('.errorA').html('');
                        }
                        if (response.error.b) {
                            $('#b').addClass('is-invalid');
                            $('.errorB').html(response.error.b);
                        } else {
                            $('#b').removeClass('is-invalid');
                            $('.errorB').html('');
                        }
                        if (response.error.c) {
                            $('#c').addClass('is-invalid');
                            $('.errorC').html(response.error.c);
                        } else {
                            $('#c').removeClass('is-invalid');
                            $('.errorC').html('');
                        }
                        if (response.error.d) {
                            $('#d').addClass('is-invalid');
                            $('.errorD').html(response.error.d);
                        } else {
                            $('#d').removeClass('is-invalid');
                            $('.errorD').html('');
                        }
                        if (response.error.e) {
                            $('#e').addClass('is-invalid');
                            $('.errorE').html(response.error.e);
                        } else {
                            $('#e').removeClass('is-invalid');
                            $('.errorE').html('');
                        }
                        if (response.error.kunci_jawaban) {
                            $('#kunci_jawaban').addClass('is-invalid');
                            $('.errorKuncijawaban').html(response.error.kunci_jawaban);
                        } else {
                            $('#kunci_jawaban').removeClass('is-invalid');
                            $('.errorKuncijawaban').html('');
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
                        listsoal();
                    }
                }
            });
        })
    });
</script>