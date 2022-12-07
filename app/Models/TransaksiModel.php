<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'transaksi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'id_warga', 'jumlah', 'tanggal_transaksi', 'keterangan', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    function findAll(int $limit = 0, int $offset = 0) {
        $this->select("warga.id as  warga_id");
        $this->select("transaksi.*");
        $this->select("warga.id as warga_id,warga.no_rek,warga.nama_lengkap,warga.no_nik,warga.pendamping,warga.alamat");
        $this->select("users.nama_user as nama_pendamping");
        $this->join("warga", "warga.id = transaksi.id_warga");
        $this->join("users", "users.id = warga.pendamping", 'left');
        return $this->get()->getResultArray();
    }
}
