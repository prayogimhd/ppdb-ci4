<table id="listgelombang" class="table table-striped dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>Gelombang</th>
            <th>File</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 0;
        foreach ($list as $data) :
            $nomor++; ?>
            <tr>
                <td><?= $nomor ?></td>
                <td><?= esc($data['gelombang_id']) ?></td>
                <td><a href="<?= base_url('file/gelombang/' . $data['file_pdf']) ?>"> <img src="<?= base_url('img/konfigurasi/logo/pdflogo.png') ?>" width="25%"> <?= esc($data['file_pdf']) ?></a></td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" onclick="edit('<?= $data['id_file'] ?>')">
                        <i class="fa fa-eye"></i> Detail
                    </button>
                    <?php if ($data['gelombang_id'] != 1 && $data['gelombang_id'] != 2) { ?>
                        <button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?= $data['id_file'] ?>')">
                            <i class="fa fa-trash"></i>
                        </button>
                    <?php
                    }
                    ?>
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#listgelombang').DataTable();
    });

    function edit(id_file) {
        $.ajax({
            type: "post",
            url: "<?= site_url('siswa/formeditgelombang') ?>",
            data: {
                id_file: id_file
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

    function hapus(id_file) {
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
                    url: "<?= site_url('siswa/hapusgelombang') ?>",
                    type: "post",
                    dataType: "json",
                    data: {
                        id_file: id_file
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
                            listgelombang();
                        }
                    },
                });
            }
        })
    }
</script>