<?= $this->extend('auth/layout/script') ?>

<?= $this->section('judul') ?>
<div class="col-sm-6">
    <h4 class="page-title"><?= $title ?></h4>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="javascript:void(0);">UJIAN</a></li>
        <li class="breadcrumb-item active">Soal Ujian</li>
    </ol>
</div>
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
<p class="sub-title"> <button type="button" class="btn btn-primary btn-sm tambahsoal"><i class=" fa fa-plus-circle"></i> Tambah Data</button>
   
</p>
<div class="viewdata">
</div>

<div class="viewmodal">
</div>


<script>
    function listsoal() {
        $.ajax({
            url: "<?= site_url('soal/getdatasoal') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
            }
        });
    }

    $(document).ready(function() {
        listsoal();
        $('.tambahsoal').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('soal/formsoal') ?>",
                dataType: "json",
                success: function(response) {
                    $('.viewmodal').html(response.data).show();

                    $('#modaltambah').modal('show');
                }
            });
        });
    });
</script>
<?= $this->endSection('isi') ?>