<?php

namespace App\Models;

use CodeIgniter\Model;

class Dana extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'dana';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = ["id", "dana_awal", "periode", "tahun", "keterangan"];

    function totalDanaAwal() {
        $this->selectSum('dana_awal');
        return $this->first();
    }
}
