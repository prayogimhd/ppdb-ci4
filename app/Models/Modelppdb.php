<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelppdb extends Model
{
    protected $table      = 'ppdb';
    protected $primaryKey = 'ppdb_id';
    protected $allowedFields = [
        'nisn',
        'password',
        'nama_lengkap',
        'nama_panggilan',
        'tgl_lahir',
        'tmp_lahir',
        'jenkel',
        'asal_sekolah',
        'nama_ayah',
        'nama_ibu',
        'alamat',
        'no_telp',
        'jurusan',
        'foto_siswa',
        'foto_ijazah',
        'bukti_pembayaran',
        'status_pembayaran',
        'tgl_daftar',
        'agama',
        'jenis_tinggal',
        'transportasi',
        'kewarganegaraan',
        'anak_keberapa',
        'jumlah_kandung',
        'jumlah_tiri',
        'jumlah_angkat',
        'yatim_piatu',
        'bahasa',
        'jarak_tempuh',
        'golongan_darah',
        'penyakit_diderita',
        'kelainan_jasmani',
        'tinggi_berat',
        'gelombang_id',
        'status',
        'status_ujian_proses',
        'status_ujian_selesai',
        'benar',
        'salah',
        'nilai',
    ];

    public function getsiswa($id)
    {
        return $this->table('ppdb')
            ->like('status', 'lulus')
            ->where('ppdb_id', $id)
            ->get()->getRow();
    }

    public function proses()
    {
        return $this->table('ppdb')
            ->selectCount('ppdb_id')
            ->where('status', 'Proses')
            ->first();
    }

    public function lulus()
    {
        return $this->table('ppdb')
            ->selectCount('ppdb_id')
            ->where('status', 'Lulus')
            ->first();
    }

    public function tidaklulus()
    {
        return $this->table('ppdb')
            ->selectCount('ppdb_id')
            ->where('status', 'Gagal')
            ->first();
    }

    public function tes()
    {
        return $this->table('ppdb')
            ->selectCount('ppdb_id')
            ->where('status', 'Tes')
            ->first();
    }

    public function jumlahlaki()
    {
        return $this->table('ppdb')
            ->selectCount('ppdb_id')
            ->where('jenkel', 'Laki-Laki')
            ->first();
    }

    public function jumlahperempuan()
    {
        return $this->table('ppdb')
            ->selectCount('ppdb_id')
            ->where('jenkel', 'Perempuan')
            ->first();
    }

    //frontend
    public function get_kelulusan_keyword($keyword)
    {
        return $this->table('ppdb')
            ->select('*')
            ->where('nisn', $keyword)
            ->groupBy('ppdb.ppdb_id')
            ->orderBy('nisn', 'ASC')
            ->get()->getResultArray();
    }

    public function search_kelulusan($keyword)
    {
        return $this->table('spp')
            ->like('nisn', $keyword)
            ->orderBy('nisn', 'ASC')
            ->get()->getResultArray();
    }
}
