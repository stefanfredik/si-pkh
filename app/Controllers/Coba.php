<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Coba as ModelsCoba;
use App\Models\Modelfile;
use CodeIgniter\API\ResponseTrait;

class Coba extends BaseController {
    use ResponseTrait;

    public function __construct() {
        $this->cobaModel =  new ModelsCoba();
    }

    public function index() {
        return view("coba/index");
    }


    public function ambilData() {
        $param['draw'] = $_REQUEST['draw'] ?? '';
        $start = $_REQUEST['start'] ?? 0;
        $length = $_REQUEST['length'] ?? 0;
        $search_value = $_REQUEST['search']['value'] ?? '';

        $dt = $this->cobaModel->searchAndDisplay($search_value, $start, $length);
        $totalCount = $this->cobaModel->searchAndDisplay($search_value);

        $data = [
            'draw' => intval($param['draw']),
            'recordsTotal' => count($totalCount),
            'recordsFiltered' => count($totalCount),
            'data' => $dt
        ];



        return $this->respond($data);
    }

}
