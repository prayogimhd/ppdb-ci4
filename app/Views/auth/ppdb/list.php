<?= form_open('siswa/hapusallppdb', ['class' => 'formhapus']) ?>

<button type="submit" class="btn btn-danger btn-sm">
    <i class="fa fa-trash"></i> Hapus yang diceklist
</button>

<hr>
<table id="listppdb" class="table table-striped dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>
                <input type="checkbox" id="centangSemua">
            </th>
            <th>#</th>
            <th>Nisn</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Asal Sekolah</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 0;
        foreach ($list as $data) :
            $nomor++; ?>
            <tr>
                <td>
                    <input type="checkbox" name="ppdb_id[]" class="centangPpdbid" value="<?= $data['ppdb_id'] ?>">
                </td>
                <td><?= $nomor ?></td>
                <td><?= esc($data['nisn']) ?></td>
                <td><?= esc($data['nama_lengkap']) ?></td>
                <td><?= esc($data['jenkel']) ?></td>
                <td><?= esc($data['asal_sekolah']) ?></td>
                <td>
                    <?php if ($data['status'] == 'Lulus') { ?>
                        <h6>
                            <span class="badge badge-success"><?= $data['status'] ?></span>
                        </h6>
                    <?php } elseif ($data['status'] == 'Proses') { ?>
                        <h6>
                            <span class="badge badge-secondary"><?= $data['status'] ?></span>
                        </h6>
                    <?php } elseif ($data['status'] == 'Tes') { ?>
                        <h6>
                            <span class="badge badge-warning"><?= $data['status'] ?></span>
                        </h6>
                    <?php } else { ?>
                        <h6>
                            <span class="badge badge-danger">Tidak Lulus</span>
                        </h6>
                    <?php } ?>

                </td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" onclick="edit('<?= $data['ppdb_id'] ?>')">
                        <i class="fa fa-eye"></i> Detail
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?= $data['ppdb_id'] ?>')">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>
<?= form_close() ?>
<script>
    $(document).ready(function() {
        $('#listppdb').DataTable();

        $('#centangSemua').click(function(e) {
            if ($(this).is(':checked')) {
                $('.centangPpdbid').prop('checked', true);
            } else {
                $('.centangPpdbid').prop('checked', false);
            }
        });

        $('.formhapus').submit(function(e) {
            e.preventDefault();
            let jmldata = $('.centangPpdbid:checked');
            if (jmldata.length === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Ooops!',
                    text: 'Silahkan pilih data!',
                    showConfirmButton: false,
                    timer: 1500
                })
            } else {
                Swal.fire({
                    title: 'Hapus data',
                    text: `Apakah anda yakin ingin menghapus sebanyak ${jmldata.length} data?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "post",
                            url: $(this).attr('action'),
                            data: $(this).serialize(),
                            dataType: "json",
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: 'Data berhasil dihapus!',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                listppdb();
                            }
                        });
                    }
                })
            }
        });
    });

    function edit(ppdb_id) {
        $.ajax({
            type: "post",
            url: "<?= site_url('siswa/formeditppdb') ?>",
            data: {
                ppdb_id: ppdb_id
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modaledit').modal('show');
                }
            }
        });
    }

    function hapus(ppdb_id) {
        Swal.fire({
            title: 'Hapus data?',
            text: `Apakah anda yakin menghapus data?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= site_url('siswa/hapusppdb') ?>",
                    type: "post",
                    dataType: "json",
                    data: {
                        ppdb_id: ppdb_id
                    },
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: response.sukses,
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            listppdb();
                        }
                    },
                });
            }
        })
    }
</script>