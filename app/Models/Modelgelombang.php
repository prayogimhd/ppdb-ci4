<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelgelombang extends Model
{
    protected $table      = 'file_pengumuman';
    protected $primaryKey = 'id_file';
    protected $allowedFields = [
        'gelombang_id',
        'file_pdf'
    ];

    public function getgelombang($id)
    {
        return $this->table('file_pengumuman')
            ->where('id_file', $id)
            ->get()->getRow();
    }
}
