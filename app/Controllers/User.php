<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class User extends BaseController {
    use ResponseTrait;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function index() {


        $data = [
            'title' => 'Data User',
            'dataUser' => $this->userModel->findAll()
        ];

        return view("user/index", $data);
    }

    public function tambah() {
        $data = [
            'title' => 'Tambah Data User',
            'validation' => $this->validation
        ];
        return view("/user/tambah", $data);
    }

    public function add() {
        $rules = [
            'nama_user'  => [
                'rules'  => 'required',
            ],
            'username'  => [
                'rules'  => 'min_length[6]|required|is_unique[user.username]',
                'errors' => [
                    'is_unique' => 'Username telah digunakan.',
                    'min_length' => 'Username minimal 6 Digit.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'min_length' => 'Password minimal 8 Digit.'
                ]
            ],
            'password2' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'matches' => 'Password tidak sama.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $data = [
                'validation' => $this->validation
            ];

            setSwall("Gagal Menambah Data Data!", "error");
            return redirect()->to('/user/tambah')->withInput()->with('validation', $data);
        } else {
            $data = $this->request->getPost();
            $this->userModel->save($data);

            setSwall("Sukses Menambah Data Data");
            return redirect()->to('/user');
        }
    }


    public function edit($id) {
        $user = $this->userModel->find($id);

        $data = [
            'title' => 'Edit Data ' . $user['nama_user'],
            'user' => $user,
            'validation' => $this->validation
        ];

        return view('/user/edit', $data);
    }


    public function update($id) {
        $user = $this->userModel->find($id);


        $usernameRules = ($this->request->getPost('username') == $user['username']) ? 'required|min_length[6]' : 'min_length[6]|required|is_unique[user.username]';
        $rules = [
            'nama_user'  => [
                'rules'  => 'required',
            ],
            'username'  => [
                'rules'  => $usernameRules,
                'errors' => [
                    'is_unique' => 'Username telah digunakan.',
                    'min_length' => 'Username minimal 6 Digit.'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $data = [
                'validation' => $this->validation
            ];
            return redirect()->back()->withInput()->with('validation', $data);
        }

        $data = $this->request->getPost();
        $this->userModel->update($id, $data);

        setSwall("Sukses Mengupdate Data");
        return redirect()->to('/user');
    }

    public function delete($id) {
        $this->userModel->delete($id);
        $data = $this->request->getPost();
        $this->userModel->save($data);

        $res = [
            'status' => 'success',
            'msg'   => 'Sukses Menghapus Data!',
        ];

        setSwall("Sukses Menghaspus Data.");
        return redirect()->to('/user');
    }

    public function password($id) {
        $user = $this->userModel->find($id);
        $data = [
            'title' => 'Ganti Password ' . $user['nama_user'],
            'user' => $user,
            'validation' => $this->validation
        ];

        return view('/user/password', $data);
    }

    public function gantiPassword($id) {
        $rules = [
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'min_length' => 'Password minimal 8 Digit.'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $data = [
                'validation' => $this->validation
            ];

            return redirect()->back()->withInput()->with('validation', $data);
        }

        $data = $this->request->getPost();
        $this->userModel->update($id, $data);

        setSwall("Sukses Menngganti Password.");
        return redirect()->to('/user');
    }
}
