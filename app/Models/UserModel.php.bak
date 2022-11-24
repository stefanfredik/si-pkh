<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama_user', 'no_nik', 'jabatan', 'username', 'password', 'jenis_kelamin', 'alamat', 'telepon', 'created_at', 'updated_at', 'last_login'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function findAllPengurus() {
        $this->where('jabatan', 'pengurus');
        return $this->findAll();
    }

    public function findAllPendamping() {
        $this->where('jabatan', 'pendamping');
        return $this->findAll();
    }
}
