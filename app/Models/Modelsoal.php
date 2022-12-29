<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelsoal extends Model
{
    protected $table      = 'soal_ujian';
    protected $primaryKey = 'id_soal_ujian';
    protected $allowedFields = ['id_kategori','pertanyaan', 'a', 'b', 'c', 'd', 'e', 'kunci_jawaban'];
  
}
