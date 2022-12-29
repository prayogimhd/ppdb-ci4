<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelkategori extends Model
{
    protected $table      = 'kategori_soal';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['nama_kategori'];
  
}
