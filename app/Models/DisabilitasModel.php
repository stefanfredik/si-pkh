<?php

namespace App\Models;

use CodeIgniter\Model;

class DisabilitasModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'disabilitas';
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
        $this->select("disabilitas.*");
        $this->select("warga.id as warga_id,warga.no_rek,warga.nama_lengkap,warga.no_nik,warga.pendamping,warga.alamat");
        $this->join("warga", "warga.id = disabilitas.id_warga");
        return $this->get()->getResultArray();
    }
}
