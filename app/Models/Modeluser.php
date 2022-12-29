<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeluser extends Model
{
    protected $table      = 'user ';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['username', 'nama', 'email', 'password', 'foto', 'active'];

    //backend
    public function list()
    {
        return $this->table('user')
            ->orderBy('user_id', 'ASC')
            ->get()->getResultArray();
    }

    public function getaktif()
    {
        return $this->table('user')
            ->like('active', '1')
            ->orderBy('user_id', 'ASC')
            ->get()->getResultArray();
    }

    public function getnonaktif()
    {
        return $this->table('user')
            ->where('active', 0)
            ->orderBy('user_id', 'ASC')
            ->get()->getResultArray();
    }
}
