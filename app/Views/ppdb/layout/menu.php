<?= $this->extend('ppdb/layout/main') ?>
<?= $this->section('nav') ?>
<?php

use App\Models\Modelppdb;

$this->ppdb = new Modelppdb;
$id = session()->get('ppdb_id');
$list =  $this->ppdb->find($id);
?>
<nav class="navbar-custom">
    <ul class="navbar-right list-inline float-right mb-0">

        <!-- full screen -->
        <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
            <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                <i class="mdi mdi-arrow-expand-all noti-icon"></i>
            </a>
        </li>

        <li class="dropdown notification-list list-inline-item">
            <div class="dropdown notification-list nav-pro-img">
                <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="<?= base_url('img/ppdb/thumb/' . 'thumb_' .  $list['foto_siswa']) ?>" alt="user" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <a class="dropdown-item" href="javascript:void(0);"> <?= esc($list['nama_lengkap']) ?> </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="#" id="logout"><i class="mdi mdi-power text-danger"></i> Logout</a>
                </div>
            </div>
        </li>

    </ul>

    <ul class="list-inline menu-left mb-0">
        <li class="float-left">
            <button class="button-menu-mobile open-left waves-effect">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>

    </ul>

</nav>
<?= $this->endSection('nav') ?>


<?= $this->section('menu') ?>

<!-- <li class="menu-title">Ujian PPDB</li>
<li>
    <a href="<?= base_url('ppdb/ujian') ?>" class="waves-effect">
        <i class="mdi mdi-book-open-page-variant"></i> <span> Ujian </span>
    </a>
</li> -->

<li class="menu-title">Profile</li>
<li>
    <a href="<?= base_url('ppdb/profile') ?>" class="waves-effect">
        <i class="mdi mdi-account-star-outline"></i> <span> Data Diri </span>
    </a>
</li>
<li>
    <a href="<?= base_url('ppdb/ubahpassword') ?>" class="waves-effect">
        <i class="mdi mdi-settings-outline"></i> <span> Ubah Password </span>
    </a>
</li>

<?= $this->endSection('menu') ?>