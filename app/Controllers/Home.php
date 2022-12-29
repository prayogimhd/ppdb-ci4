<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
		$data = [
			'title' => 'Pengumuman Kelulusan - ' . $konfigurasi['nama_web'],
			'konfigurasi' => $konfigurasi,
		];
		return view('front/kelulusan/main', $data);
	}

	public function searchkelulusan()
	{
		$keyword  = $this->request->getVar('keyword');
		// dd($keyword);
		if (!isset($keyword)) return redirect()->to('/');
		$check = $this->ppdb->get_kelulusan_keyword($keyword);
		if ($check) {
			$konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
			$data = [
				'title' => 'Pengumuman Kelulusan - ' . $konfigurasi['nama_web'],
				'konfigurasi' => $konfigurasi,
				'kelulusan'	=> $check,
			];
			return view('front/kelulusan/search', $data);
		} else {
			session()->setFlashdata('alert', 'NISN yang anda masukkan tidak terdaftar!');
			return redirect()->to('/');
		}
	}

}
