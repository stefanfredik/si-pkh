<?php

namespace App\Models;

use CodeIgniter\Model;

class DanabantuanModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'danabantuan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama_bantuan', 'id_pengurus', 'keterangan'];


    function findAll(int $limit = 0, int $offset = 0) {
        $this->select('danabantuan.*');
        $this->select('user.nama_user');
        $this->join('user', 'user.id = danabantuan.id_pengurus');
        return $this->get()->getResult("array");
    }
}
