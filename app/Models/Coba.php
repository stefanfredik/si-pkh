<?php

namespace App\Models;

use CodeIgniter\Model;

class Coba extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'coba';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    protected $column_order = [null, null, "username", "jenis_kelamin", "alamat"];
    protected $column_search = ['username', 'nama'];
    protected $order = ['username' => 'asc'];


    function searchAndDisplay($katakunci = null, $start = 0, $length = 0) {
        if ($katakunci) {
            $arr_katakunci = explode(" ", $katakunci);
            for ($i = 0; $i < count($arr_katakunci); $i++) {
                $this->orLike('username', $arr_katakunci[$i]);
                $this->orLike("alamat", $arr_katakunci[$i]);
            }
        }

        if ($start != 0 or $length != 0) {
            $this->limit($length, $start);
        }

        return $this->orderBy("username")->get()->getResult();
    }
}
