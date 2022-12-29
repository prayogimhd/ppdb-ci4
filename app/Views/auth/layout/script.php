<?= $this->extend('auth/layout/main') ?>
<?= $this->extend('auth/layout/menu') ?>
<?= $this->section('script') ?>
<!-- Sweet-Alert  -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- jQuery  -->

<script src="<?= base_url() ?>/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/assets/js/metismenu.min.js"></script>
<script src="<?= base_url() ?>/assets/js/jquery.slimscroll.js"></script>
<script src="<?= base_url() ?>/assets/js/waves.min.js"></script>

<!-- App js -->
<script src="<?= base_url() ?>/assets/js/app.js"></script>
<!-- Required datatable js -->
<script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- datepicker -->
<script src="<?= base_url() ?>/assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>/assets/timepicker/bootstrap-timepicker.min.js"></script>

<!-- Buttons examples -->
<script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/jszip.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<!--Summernote js-->
<script src="<?= base_url() ?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Datatable init js -->
<script src="<?= base_url() ?>/assets/pages/datatables.init.js"></script>
<script>
    const user_id = '<?= session()->get('user_id') ?>'
    const base_url = '<?= base_url('/') ?>'
    const date = '<?= date('Y-m-d') ?>'
</script>
<script>
    $('a#logout').on('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Apakah anda yakin ingin logout?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Logout'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= site_url('login/logout') ?>",
                    type: 'post',
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Anda berhasil logout!",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1250
                        }).then(function() {
                            window.location = '<?= site_url('auth/login') ?>';
                        });
                    }
                });
            }
        })
    })
</script>
<?= $this->endSection('script') ?>