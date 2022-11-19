<?php

namespace App\Models;

use CodeIgniter\Model;

class WargaModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'warga';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama_lengkap', 'jenis_kelamin', 'no_nik', 'no_kk', 'tanggal_lahir', 'pendidikan', 'pekerjaan', 'penghasilan', 'no_telepon', 'no_rek', 'alamat', 'rt_rw', 'kode_pos', 'desa', 'kecamatan', 'kabupaten', 'provinsi', 'jumlah_anak', 'jumlah_sd', 'jumlah_smp', 'jumlah_sma', 'jumlah_balita', 'jumlah_lansia', 'jumlah_disabilitas', 'pendamping', 'jenis_bantuan', 'tahun', 'periode', 'created_at', 'updated_at', 'last_login'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // function findAll(int $limit = 0, int $offset = 0) {
    //     $this->select('warga.*');
    //     $this->select('user.nama_user,user.id as id_user');
    //     $this->select('danabantuan.nama_bantuan');
    //     $this->select('danabantuan.id as id_bantuan');
    //     $this->join('user', 'user.id = warga.pendamping');
    //     $this->join('danabantuan', 'danabantuan.id = warga.jenis_bantuan');
    //     return $this->get()->getResultArray();
    // }

    function filter($tahun = null, $periode = null, $bantuan = null) {

        $this->select('warga.*');
        $this->select('user.nama_user,user.id as id_user');
        $this->select('danabantuan.nama_bantuan');
        $this->select('danabantuan.id as id_bantuan');
        $this->join('user', 'user.id = warga.pendamping');
        $this->join('danabantuan', 'danabantuan.id = warga.jenis_bantuan');

        if ($tahun) {
            $this->where('tahun', $tahun);
        }

        if ($periode) {
            $this->where('periode', $periode);
        }

        if ($bantuan) {
            $this->where('jenis_bantuan', $bantuan);
        }
        return $this->get()->getResultArray();
        // return $this->findAll();
    }

    function find($id = null) {
        $this->select('warga.*');
        $this->where('warga.id', $id);
        $this->select('user.nama_user');
        $this->join('user', 'user.id = warga.pendamping');
        return $this->first();
    }
}
