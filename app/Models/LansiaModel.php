<?php

namespace App\Models;

use CodeIgniter\Model;

class LansiaModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'lansia';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'id_warga', 'tanggal_terima', 'keterangan', 'created_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';


    function findAll(int $limit = 0, int $offset = 0) {
        $this->select("warga.id as  warga_id");
        $this->select("lansia.*");
        $this->select("users.nama_user as nama_pendamping");
        $this->select("warga.id as warga_id,warga.no_rek,warga.nama_lengkap,warga.no_nik,warga.pendamping,warga.alamat");
        $this->join("warga", "warga.id = lansia.id_warga");
        $this->join("users", "users.id = warga.pendamping", 'left');
        return $this->get()->getResultArray();
    }
}
