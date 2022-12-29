<?= form_open('konfigurasi/hapusalluser', ['class' => 'formhapus']) ?>

<button type="submit" class="btn btn-danger btn-sm">
    <i class="fa fa-trash"></i> Hapus yang diceklist
</button>

<hr>
<table id="listuser" class="table table-striped dt-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>
                <input type="checkbox" id="centangSemua">
            </th>
            <th>#</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Status</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>


    <tbody>
        <?php $nomor = 0;
        foreach ($list as $data) :
            $nomor++; ?>
            <tr>
                <?php if ($data['username'] != 'admin') { ?>
                    <td>
                        <input type="checkbox" name="user_id[]" class="centangUserid" value="<?= $data['user_id'] ?>">
                    </td>
                <?php
                } else { ?>
                <td></td>
                <?php }
                ?>
                <td><?= $nomor ?></td>
                <td><?= esc($data['username']) ?></td>
                <td><?= esc($data['nama']) ?></td>
                <td><?= esc($data['email']) ?></td>
                <td>
                    <?php if ($data['active'] == '1') { ?>
                        <h6>
                            <span class="badge badge-success">Aktif</span>
                        </h6>
                    <?php } else { ?>
                        <h6>
                            <span class="badge badge-danger">Tidak Aktif</span>
                        </h6>
                    <?php } ?>
                </td>
                <td class="text-center"><img onclick="gambar('<?= $data['user_id'] ?>')" src="<?= base_url('img/user/thumb/' . 'thumb_' . $data['foto']) ?>" width="120px" class="img-thumbnail"></td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" onclick="edit('<?= $data['user_id'] ?>')">
                        <i class="fa fa-edit"></i>
                    </button>
                    <?php if ($data['username'] != 'admin') { ?>
                        <button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?= $data['user_id'] ?>')">
                            <i class="fa fa-trash"></i>
                        </button>
                        <button type="button" onclick="toggle('<?= $data['user_id'] ?>')" class="btn btn-circle btn-sm <?= $data['active'] ? 'btn-secondary' : 'btn-success' ?>" title="<?= $data['active'] ? 'Nonaktifkan' : 'Aktifkan' ?>"><i class="fa fa-fw fa-power-off"></i>
                        </button>
                    <?php
                    }
                    ?>
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>
<?= form_close() ?>
<script>
    $(document).ready(function() {
        $('#listuser').DataTable();

        $('#centangSemua').click(function(e) {
            if ($(this).is(':checked')) {
                $('.centangUserid').prop('checked', true);
            } else {
                $('.centangUserid').prop('checked', false);
            }
        });

        $('.formhapus').submit(function(e) {
            e.preventDefault();
            let jmldata = $('.centangUserid:checked');
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
                    title: 'Hapus user',
                    text: `Apakah anda yakin ingin menghapus sebanyak ${jmldata.length} user?`,
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
                                listuser();
                            }
                        });
                    }
                })
            }
        });
    });

    function toggle(user_id) {
        $.ajax({
            type: "post",
            url: "<?= site_url('konfigurasi/toggle') ?>",
            data: {
                user_id: user_id
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    Swal.fire({
                        icon: 'success',
                        title: response.sukses,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    listuser();
                }
            }
        });
    }

    function edit(user_id) {
        $.ajax({
            type: "post",
            url: "<?= site_url('konfigurasi/formedituser') ?>",
            data: {
                user_id: user_id
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

    function hapus(user_id) {
        Swal.fire({
            title: 'Hapus user?',
            text: `Apakah anda yakin menghapus user?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= site_url('konfigurasi/hapususer') ?>",
                    type: "post",
                    dataType: "json",
                    data: {
                        user_id: user_id
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
                            listuser();
                        }
                    }
                });
            }
        })
    }

    function gambar(user_id) {
        $.ajax({
            type: "post",
            url: "<?= site_url('konfigurasi/formuploaduser') ?>",
            data: {
                user_id: user_id
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modalupload').modal('show');
                }
            }
        });
    }
</script>