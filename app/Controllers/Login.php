<?php

namespace App\Controllers;

class Login extends BaseController
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        if (session('login')) {
            session()->setFlashdata('pesan_gagal', 'Anda sudah login!');
            return redirect()->to('/auth/dashboard');
        }
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $data = [
            'title' => 'Login - ' . $konfigurasi['nama_web']
        ];
        return view('auth/login', $data);
    }

    public function validasi()
    {
        if ($this->request->isAJAX()) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'username' => [
                    'label' => 'Username',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi!'
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi!'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'username' => $validation->getError('username'),
                        'password' => $validation->getError('password')
                    ]
                ];
            } else {

                //cek user
                $query_cekuser = $this->db->query("SELECT * FROM user WHERE username='$username'");

                $result = $query_cekuser->getResult();

                if (count($result) > 0) {
                    $row = $query_cekuser->getRow();
                    $password_user = $row->password;

                    if (password_verify($password, $password_user)) {
                        if ($row->active == 1) {
                            $simpan_session = [
                                'login' => true,
                                'user_id' => $row->user_id,
                                'username' => $username,
                                'nama'  => $row->nama,
                                'foto'  => $row->foto,
                            ];

                            $this->session->set($simpan_session);

                            $msg = [
                                'sukses' => [
                                    'link' => '/auth/dashboard'
                                ]
                            ];
                        } else {
                            $msg = [
                                'nonactive' => [
                                    'nonactive' => 'User tidak aktif!'
                                ]
                            ];
                        }
                    } else {
                        $msg = [
                            'error' => [
                                'password' => 'Password salah!'
                            ]
                        ];
                    }
                } else {
                    $msg = [
                        'error' => [
                            'username' => 'User tidak ditemukan!'
                        ]
                    ];
                }
            }

            echo json_encode($msg);
        }
    }

    public function logout()
    {
        if ($this->request->isAJAX()) {

            $this->session->destroy();

            $data = [
                'respond'   => 'success',
                'message'   => 'Anda berhasil logout!'
            ];

            echo json_encode($data);
        }
    }
}
