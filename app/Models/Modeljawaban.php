<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeljawaban extends Model
{
    protected $table      = 'jawaban_ujian';
    protected $primaryKey = 'id_jawaban';
    protected $allowedFields = ['id_ppdb','id_soal_ujian', 'jawaban', 'skor'];
  
}
