<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\API\ResponseTrait;
use Myth\Auth\Password;

class User extends BaseController {
    use ResponseTrait;

    private $info = [
        'url' => 'user',
        'title' => 'User'
    ];

    public function __construct() {
        $this->userModel = new UsersModel();
    }

    public function index() {


        $data = [
            'title' => 'Data User',
            'dataUser' => $this->userModel->findAll(),
            'info' => $this->info
        ];

        // dd($data);


        return view("user/index", $data);
    }

    public function tambah() {
        $data = [
            'title' => 'Tambah Data User',
            'validation' => $this->validation,
            'role'      => $this->userModel->findAllRole()
        ];

        // dd($data);

        return view("/user/tambah", $data);
    }

    public function add() {
        $rules = [
            'nama_user'  => [
                'rules'  => 'required',
            ],
            'username'  => [
                'rules'  => 'required|min_length[3]|max_length[30]|is_unique[users.username,id,{id}]',
                'errors' => [
                    'is_unique' => 'Username telah digunakan.',
                    'min_length' => 'Username minimal 3 Digit.'
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
            return redirect()->to('/user/tambah')->withInput();
        } else {
            $data = [
                'username' => $this->request->getPost('username'),
                'nama_user' => $this->request->getPost('nama_user'),
                'telepon' => $this->request->getPost('telepon'),
                'no_nik' => $this->request->getPost('no_nik'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'alamat' => $this->request->getPost('alamat'),
                'password_hash' => Password::hash($this->request->getPost('password')),
                'active'    => 1
            ];

            $this->userModel->withGroup($this->request->getPost('jabatan'))->save($data);

            setSwall("Sukses Menambah Data Data");
            return redirect()->to('/user');
        }
    }


    public function edit($id) {
        $user = $this->userModel->find($id);

        // dd($user);
        $data = [
            'title' => 'Edit Data ' . $user['nama_user'],
            'user' => $user,
            'validation' => $this->validation,
            'role'      => $this->userModel->findAllRole()
        ];

        return view('/user/edit', $data);
    }


    public function update($id) {
        $user = $this->userModel->find($id);


        $usernameRules = ($this->request->getPost('username') == $user['username']) ? 'required|min_length[3]' : 'min_length[3]|required|is_unique[users.username]';
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
            return redirect()->back()->withInput();
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'nama_user' => $this->request->getPost('nama_user'),
            'telepon' => $this->request->getPost('telepon'),
            'no_nik' => $this->request->getPost('no_nik'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        $this->userModel->update($id, $data);
        $this->userModel->updateGroup($id, $this->request->getPost("jabatan"));

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

        setSwall("Sukses Menghapus Data.");
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


        $data = ['password_hash' => Password::hash($this->request->getPost('password'))];
        $this->userModel->update($id, $data);

        setSwall("Sukses Menngganti Password.");
        return redirect()->to('/user');
    }
}
