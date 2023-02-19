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


    public function danaTerpakai($periode, $tahun) {
        $this->selectSum("jumlah");
        // $this->select("warga.*");
        $this->join("warga", "warga.id = transaksi.id_warga");
        $this->where("warga.periode", $periode);
        $this->where("warga.tahun", $tahun);
        return $this->first();
    }


    public function allDanaTerpakai() {
        $this->selectSum("jumlah");
        $this->join("warga", "warga.id = transaksi.id_warga");
        return $this->first();
    }

    public function jumAllPenerima(string $jenisBantuan, $periode = null, $tahun = null) {

        $this->join("warga", "warga.id = transaksi.id_warga");
        $this->where("warga.jenis_bantuan", $jenisBantuan);
        if ($periode != null) {
            $this->where("warga.periode", $periode);
        }

        if ($tahun != null) {
            $this->where("warga.tahun", $tahun);
        }


        return $this->countAllResults("jumlah");;
    }


    public function findAllNonBantuanTunai($jenisBantuan) {
        $this->select("warga.*");
        $this->join("warga", "warga.id = transaksi.id_warga", "right outer");
        $this->where("warga.jenis_bantuan", $jenisBantuan);
        $this->where("transaksi.id_warga", null);
        return $this->get()->getResultArray();
    }
}
