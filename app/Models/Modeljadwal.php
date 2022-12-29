<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeljadwal extends Model
{
    protected $table      = 'jadwal_ujian';
    protected $primaryKey = 'id_jadwal';
    protected $allowedFields = ['gelombang_id','tanggal_ujian', 'jam_ujian', 'durasi_ujian', 'timer_ujian'];
  
}