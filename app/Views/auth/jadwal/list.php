<table id="listsoal" class="table table-striped dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>Gelombang</th>
            <th>Tanggal Ujian</th>
            <th>Jam Ujian</th>
            <th>Durasi Ujian</th>
            <th>Timer</th>
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
                <td><?= esc($data['tanggal_ujian']) ?></td>
                <td><?= esc($data['jam_ujian']) ?></td>
                <td><?= esc($data['durasi_ujian']) ?></td>
                <td><?= esc($data['timer_ujian']) ?></td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" onclick="edit('<?= $data['id_jadwal'] ?>')">
                        <i class="fa fa-edit"></i>
                    </button>
                    <?php if ($data['gelombang_id'] != 1 && $data['gelombang_id'] != 2) { ?>
                        <button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?= $data['id_jadwal'] ?>')">
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
        $('#listjadwal').DataTable();
    });

    function edit(id_jadwal) {
        $.ajax({
            type: "post",
            url: "<?= site_url('jadwal/formeditjadwal') ?>",
            data: {
                id_jadwal: id_jadwal
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

    function hapus(id_jadwal) {
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
                    url: "<?= site_url('jadwal/hapusjadwal') ?>",
                    type: "post",
                    dataType: "json",
                    data: {
                        id_jadwal: id_jadwal
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
                            listjadwal();
                        }
                    },
                });
            }
        })
    }
</script>