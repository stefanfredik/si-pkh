<?php

namespace App\Models;

use CodeIgniter\Model;

class WargaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'warga';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama_lengkap', 'jenis_kelamin', 'no_nik', 'no_kk', 'tanggal_lahir', 'pendidikan', 'pekerjaan', 'penghasilan', 'no_telepon', 'nama_ibukandung', 'nama_pengasuh', 'no_rek', 'alamat', 'rt_rw', 'kode_pos', 'desa', 'kecamatan', 'kabupaten', 'provinsi', 'pendamping', 'jenis_bantuan', 'tahun', 'periode', 'created_at', 'updated_at', 'last_login'];

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

    function filter($tahun = null, $periode = null, $bantuan = null)
    {

        $this->select('warga.*');
        $this->select('users.nama_user,users.id as id_user');
        $this->select('danabantuan.nama_bantuan');
        $this->select('danabantuan.id as id_bantuan');
        $this->join('users', 'users.id = warga.pendamping');
        $this->join('danabantuan', 'danabantuan.nama_bantuan = warga.jenis_bantuan');

        if ($tahun) {
            $this->where('tahun', $tahun);
        }

        if ($periode) {
            $this->where('periode', $periode);
        }

        if ($bantuan) {
            $this->where('nama_bantuan', $bantuan);
        }
        return $this->get()->getResultArray();
    }

    function find($id = null)
    {
        $this->select('warga.*');
        $this->where('warga.id', $id);
        $this->select('users.nama_user');
        $this->join('users', 'users.id = warga.pendamping');
        return $this->first();
    }


    function findAllWarga($jenisBantuan = null)
    {
        $this->select("warga.*");
        $this->select('users.nama_user as nama_pendamping');
        $this->where("warga.jenis_bantuan", $jenisBantuan);
        $this->join('users', 'users.id = warga.pendamping');
        return $this->findAll();
    }
}
