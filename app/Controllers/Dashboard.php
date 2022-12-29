<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('user_id')) {
            return redirect()->to('login');
        }
        $proses = $this->ppdb->proses();
        $lulus = $this->ppdb->lulus();
        $tidaklulus = $this->ppdb->tidaklulus();
        $tes = $this->ppdb->tes();
        $perempuan = $this->ppdb->jumlahperempuan();
        $lakilaki = $this->ppdb->jumlahlaki();
        $ppdb = $this->ppdb->selectCount('ppdb_id')->first();
        $data = [
            'title' => 'Admin - Dashboard',
            'proses' => $proses,
            'lulus' => $lulus,
            'tidaklulus' => $tidaklulus,
            'tes' => $tes,
            'lakilaki' => $lakilaki,
            'perempuan' => $perempuan,
            'ppdb' => $ppdb,
        ];
        return view('auth/dashboard', $data);
    }
}
