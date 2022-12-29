<table id="listsoal" class="table table-striped dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th width="20%">Kategori</th>
            <th width="40%">Pertanyaan</th>
            <th width="10%">Kunci Jawaban</th>
            <th width="10%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 0;
        foreach ($list as $data) :
            $nomor++; ?>
            <tr>
                <td><?= $nomor ?></td>
                <td><?= esc($data['nama_kategori']) ?></td>
                <!-- <td><?= esc($data['pertanyaan']) ?></td> -->
               <td>
                    <?php echo $data['pertanyaan']; ?>

                    <ol type="A">
                        <li>
                            <?php if ('A' == $data['kunci_jawaban']) {
                                echo "<b>";
                                echo $data['a'];
                                echo "</b>";
                            } else {
                                echo $data['a'];
                            }
                            ?>
                        </li>
                        <li>
                            <?php if ('B' == $data['kunci_jawaban']) {
                                echo "<b>";
                                echo $data['b'];
                                echo "</b>";
                            } else {
                                echo $data['b'];
                            }
                            ?>
                        </li>
                        <li>
                            <?php if ('C' == $data['kunci_jawaban']) {
                                echo "<b>";
                                echo $data['c'];
                                echo "</b>";
                            } else {
                                echo $data['c'];
                            }
                            ?>
                        </li>
                        <li>
                            <?php if ('D' == $data['kunci_jawaban']) {
                                echo "<b>";
                                echo $data['d'];
                                echo "</b>";
                            } else {
                                echo $data['d'];
                            }
                            ?>
                        </li>
                        <li>
                            <?php if ('E' == $data['kunci_jawaban']) {
                                echo "<b>";
                                echo $data['e'];
                                echo "</b>";
                            } else {
                                echo $data['e'];
                            }
                            ?>
                        </li>
                    </ol>
                </td>
                <td><?= esc($data['kunci_jawaban']) ?></td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" onclick="edit('<?= $data['id_soal_ujian'] ?>')">
                        <i class="fa fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?= $data['id_soal_ujian'] ?>')">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#listsoal').DataTable();
    });

    function edit(id_soal_ujian) {
        $.ajax({
            type: "post",
            url: "<?= site_url('soal/formeditsoal') ?>",
            data: {
                id_soal_ujian: id_soal_ujian
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

    function hapus(id_soal_ujian) {
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
                    url: "<?= site_url('soal/hapusoal') ?>",
                    type: "post",
                    dataType: "json",
                    data: {
                        id_soal_ujian: id_soal_ujian
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
                            listsoal();
                        }
                    },
                });
            }
        })
    }
</script>