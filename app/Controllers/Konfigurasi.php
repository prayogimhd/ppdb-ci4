<?php

namespace App\Controllers;

class Konfigurasi extends BaseController
{
    public function index()
    {
        $list =  $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $data = [
            'title'             => 'Konfigurasi Web - ' . $list['nama_web'],
            'konfigurasi'       => $this->konfigurasi->list(),
            'konfigurasi_id'    => $list['konfigurasi_id'],
            'nama_web'          => $list['nama_web'],
            'deskripsi'         => $list['deskripsi'],
            'visi'              => $list['visi'],
            'misi'              => $list['misi'],
            'instagram'         => $list['instagram'],
            'facebook'          => $list['facebook'],
            'whatsapp'          => $list['whatsapp'],
            'email'             => $list['email'],
            'nama_rek'          => $list['nama_rek'],
            'no_rek'            => $list['no_rek'],
            'alamat'            => $list['alamat'],
            'logo'              => $list['logo'],
            'icon'              => $list['icon'],
        ];
        return view('auth/konfigurasi/website', $data);
    }

    public function submit()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_web' => [
                    'label' => 'Nama website',
                    'rules' => 'required|alpha_numeric_space',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'alpha_numeric_space' => 'Tidak boleh mengandung karakter unik',
                    ]
                ],
                'deskripsi' => [
                    'label' => 'Deskripsi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'visi' => [
                    'label' => 'Visi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'misi' => [
                    'label' => 'Misi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'instagram' => [
                    'label' => 'Instagram',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'facebook' => [
                    'label' => 'Facebook',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'whatsapp' => [
                    'label' => 'Whatsapp',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama_rek' => [
                    'label' => 'Nama Rekening',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'no_rek' => [
                    'label' => 'Nomor Rekening',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_web'      => $validation->getError('nama_web'),
                        'deskripsi'     => $validation->getError('deskripsi'),
                        'visi'          => $validation->getError('visi'),
                        'misi'          => $validation->getError('misi'),
                        'instagram'     => $validation->getError('instagram'),
                        'facebook'      => $validation->getError('facebook'),
                        'whatsapp'      => $validation->getError('whatsapp'),
                        'email'         => $validation->getError('email'),
                        'nama_rek'      => $validation->getError('nama_rek'),
                        'no_rek'        => $validation->getError('no_rek'),
                        'alamat'        => $validation->getError('alamat'),
                    ]
                ];
            } else {
                $simpandata = [
                    'nama_web'     => $this->request->getVar('nama_web'),
                    'deskripsi'    => $this->request->getVar('deskripsi'),
                    'visi'         => $this->request->getVar('visi'),
                    'misi'         => $this->request->getVar('misi'),
                    'instagram'    => $this->request->getVar('instagram'),
                    'facebook'     => $this->request->getVar('facebook'),
                    'whatsapp'     => $this->request->getVar('whatsapp'),
                    'email'        => $this->request->getVar('email'),
                    'nama_rek'     => $this->request->getVar('nama_rek'),
                    'no_rek'       => $this->request->getVar('no_rek'),
                    'alamat'       => $this->request->getVar('alamat'),
                ];
                $konfigurasi_id = $this->request->getVar('konfigurasi_id');
                $this->konfigurasi->update($konfigurasi_id, $simpandata);
                $msg = [
                    'sukses' => 'Data berhasil diupdate'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function formuploadlogo()
    {
        if ($this->request->isAJAX()) {
            $konfigurasi_id = $this->request->getVar('konfigurasi_id');
            $list =  $this->konfigurasi->find($konfigurasi_id);
            $data = [
                'title' => 'Upload Logo Website',
                'list'  => $list,
                'konfigurasi_id' => $list['konfigurasi_id']
            ];
            $msg = [
                'sukses' => view('auth/konfigurasi/uploadlogo', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function douploadlogo()
    {
        if ($this->request->isAJAX()) {

            $konfigurasi_id = $this->request->getVar('konfigurasi_id');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'logo' => [
                    'label' => 'Upload Logo',
                    'rules' => 'uploaded[logo]|mime_in[logo,image/png,image/jpg,image/jpeg]|is_image[logo]',
                    'errors' => [
                        'uploaded' => 'Masukkan gambar',
                        'mime_in' => 'Harus gambar!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'logo' => $validation->getError('logo')
                    ]
                ];
            } else {

                //check
                $cekdata = $this->konfigurasi->find($konfigurasi_id);
                $fotolama = $cekdata['logo'];
                if ($fotolama != 'default.png') {
                    unlink('img/konfigurasi/logo/' . $fotolama);
                    unlink('img/konfigurasi/logo/thumb/' . 'thumb_' . $fotolama);
                }

                $filegambar = $this->request->getFile('logo');

                $updatedata = [
                    'logo' => $filegambar->getName(),
                ];

                $this->konfigurasi->update($konfigurasi_id, $updatedata);

                \Config\Services::image()
                    ->withFile($filegambar)
                    ->fit(250, 250, 'center')
                    ->save('img/konfigurasi/logo/thumb/' . 'thumb_' .  $filegambar->getName());
                $filegambar->move('img/konfigurasi/logo');
                $msg = [
                    'sukses' => 'Gambar berhasil diupload!',
                ];
            }
            echo json_encode($msg);
        }
    }

    public function formuploadicon()
    {
        if ($this->request->isAJAX()) {
            $konfigurasi_id = $this->request->getVar('konfigurasi_id');
            $list =  $this->konfigurasi->find($konfigurasi_id);
            $data = [
                'title' => 'Upload Icon Website',
                'list'  => $list,
                'konfigurasi_id' => $list['konfigurasi_id']
            ];
            $msg = [
                'sukses' => view('auth/konfigurasi/uploadicon', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function douploadicon()
    {
        if ($this->request->isAJAX()) {

            $konfigurasi_id = $this->request->getVar('konfigurasi_id');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'icon' => [
                    'label' => 'Upload Icon',
                    'rules' => 'uploaded[icon]|mime_in[icon,image/png,image/jpg,image/jpeg]|is_image[icon]',
                    'errors' => [
                        'uploaded' => 'Masukkan gambar',
                        'mime_in' => 'Harus gambar!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'icon' => $validation->getError('icon')
                    ]
                ];
            } else {

                //check
                $cekdata = $this->konfigurasi->find($konfigurasi_id);
                $fotolama = $cekdata['icon'];
                if ($fotolama != 'default.png') {
                    unlink('img/konfigurasi/icon/' . $fotolama);
                    unlink('img/konfigurasi/icon/thumb/' . 'thumb_' . $fotolama);
                }

                $filegambar = $this->request->getFile('icon');

                $updatedata = [
                    'icon' => $filegambar->getName(),
                ];

                $this->konfigurasi->update($konfigurasi_id, $updatedata);

                \Config\Services::image()
                    ->withFile($filegambar)
                    ->fit(250, 250, 'center')
                    ->save('img/konfigurasi/icon/thumb/' . 'thumb_' .  $filegambar->getName());
                $filegambar->move('img/konfigurasi/icon');
                $msg = [
                    'sukses' => 'Gambar berhasil diupload!',
                ];
            }
            echo json_encode($msg);
        }
    }

    public function user()
    {
        $list =  $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $data = [
            'title' => 'Konfigurasi User - ' .  $list['nama_web']
        ];
        return view('auth/user/index', $data);
    }

    public function getuser()
    {
        if ($this->request->isAJAX()) {
            $list =  $this->konfigurasi->orderBy('konfigurasi_id')->first();
            $data = [
                'title' => 'Konfigurasi User - ' .  $list['nama_web'],
                'list' => $this->user->list()
            ];
            $msg = [
                'data' => view('auth/user/list', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function formuser()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Tambah User',
            ];
            $msg = [
                'data' => view('auth/user/tambah', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function simpanuser()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'username' => [
                    'label' => 'Username',
                    'rules' => 'required|is_unique[user.username]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh sama',
                    ]
                ],
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'valid_email' => 'Masukkan {field} dengan benar',
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'level' => [
                    'label' => 'Level',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'username'  => $validation->getError('username'),
                        'nama'   => $validation->getError('nama'),
                        'email'           => $validation->getError('email'),
                        'password'        => $validation->getError('password'),
                        'level'        => $validation->getError('level'),
                        'active'        => $validation->getError('active'),
                    ]
                ];
            } else {
                $simpandata = [
                    'username'     => $this->request->getVar('username'),
                    'nama'         => $this->request->getVar('nama'),
                    'email'        => $this->request->getVar('email'),
                    'isi'          => $this->request->getVar('isi'),
                    'password'     => (password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)),
                    'level'        => $this->request->getVar('level'),
                    'foto'         => $this->request->getVar('foto'),
                    'active'       => $this->request->getVar('active'),
                ];

                $this->user->insert($simpandata);
                $msg = [
                    'sukses' => 'Data berhasil disimpan'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function toggle()
    {
        if ($this->request->isAJAX()) {
            $user_id = $this->request->getVar('user_id');
            $cari =  $this->user->find($user_id);

            if ($cari['active'] == '1') {
                $list =  $this->user->getaktif($user_id);
                $toggle = $list ? 0 : 1;
                $updatedata = [
                    'active'        => $toggle,
                ];
                $this->user->update($user_id, $updatedata);
                $msg = [
                    'sukses' => 'Berhasil nonaktifkan user!'
                ];
            } else {
                $list =  $this->user->getnonaktif($user_id);
                $toggle = $list ? 1 : 0;
                $updatedata = [
                    'active'        => $toggle,
                ];
                $this->user->update($user_id, $updatedata);
                $msg = [
                    'sukses' => 'Berhasil mengaktifkan user!'
                ];
            }


            echo json_encode($msg);
        }
    }

    public function formedituser()
    {
        if ($this->request->isAJAX()) {
            $user_id = $this->request->getVar('user_id');
            $list =  $this->user->find($user_id);
            $data = [
                'title'         => 'Edit User',
                'user_id'       => $list['user_id'],
                'username'      => $list['username'],
                'nama'          => $list['nama'],
                'email'         => $list['email'],
                'active'        => $list['active'],
            ];
            $msg = [
                'sukses' => view('auth/user/edit', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'username' => [
                    'label' => 'Username',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'valid_email' => 'Masukkan {field} dengan benar',
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'username'  => $validation->getError('username'),
                        'nama'   => $validation->getError('nama'),
                        'email'           => $validation->getError('email'),
                        'password'        => $validation->getError('password'),
                        'level'        => $validation->getError('level'),
                    ]
                ];
            } else {
                $updatedata = [
                    'username'  => $this->request->getVar('username'),
                    'nama'      => $this->request->getVar('nama'),
                    'email'     => $this->request->getVar('email'),
                    'isi'           => $this->request->getVar('isi'),
                    'password'     => (password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)),
                    'level'        => $this->request->getVar('level'),
                ];

                $user_id = $this->request->getVar('user_id');
                $this->user->update($user_id, $updatedata);
                $msg = [
                    'sukses' => 'Data berhasil diupdate'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function hapususer()
    {
        if ($this->request->isAJAX()) {

            $user_id = $this->request->getVar('user_id');
            //check
            $cekdata = $this->user->find($user_id);
            $fotolama = $cekdata['foto'];
            if ($fotolama != 'default.png') {
                unlink('img/user/' . $fotolama);
                unlink('img/user/thumb/' . 'thumb_' . $fotolama);
            }
            $this->user->delete($user_id);
            $msg = [
                'sukses' => 'Data User Berhasil Dihapus'
            ];

            echo json_encode($msg);
        }
    }

    public function hapusalluser()
    {
        if ($this->request->isAJAX()) {
            $user_id = $this->request->getVar('user_id');
            $jmldata = count($user_id);
            for ($i = 0; $i < $jmldata; $i++) {
                //check
                $cekdata = $this->user->find($user_id[$i]);
                $fotolama = $cekdata['foto'];
                if ($fotolama != 'default.png') {
                    unlink('img/user/' . $fotolama);
                    unlink('img/user/thumb/' . 'thumb_' . $fotolama);
                }
                $this->user->delete($user_id[$i]);
            }

            $msg = [
                'sukses' => "$jmldata Data berhasil dihapus"
            ];
            echo json_encode($msg);
        }
    }

    public function formuploaduser()
    {
        if ($this->request->isAJAX()) {
            $user_id = $this->request->getVar('user_id');
            $list =  $this->user->find($user_id);
            $data = [
                'title' => 'Upload Foto',
                'list'  => $list,
                'user_id' => $user_id
            ];
            $msg = [
                'sukses' => view('auth/user/upload', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function douploaduser()
    {
        if ($this->request->isAJAX()) {

            $user_id = $this->request->getVar('user_id');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'foto' => [
                    'label' => 'Upload Foto',
                    'rules' => 'uploaded[foto]|mime_in[foto,image/png,image/jpg,image/jpeg]|is_image[foto]',
                    'errors' => [
                        'uploaded' => 'Masukkan gambar',
                        'mime_in' => 'Harus gambar!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'foto' => $validation->getError('foto')
                    ]
                ];
            } else {

                //check
                $cekdata = $this->user->find($user_id);
                $fotolama = $cekdata['foto'];
                if ($fotolama != 'default.png') {
                    unlink('img/user/' . $fotolama);
                    unlink('img/user/thumb/' . 'thumb_' . $fotolama);
                }

                $filegambar = $this->request->getFile('foto');

                $updatedata = [
                    'foto' => $filegambar->getName()
                ];

                $this->user->update($user_id, $updatedata);

                \Config\Services::image()
                    ->withFile($filegambar)
                    ->fit(250, 250, 'center')
                    ->save('img/user/thumb/' . 'thumb_' .  $filegambar->getName());
                $filegambar->move('img/user');
                $msg = [
                    'sukses' => 'Gambar berhasil diupload!'
                ];
            }
            echo json_encode($msg);
        }
    }
}
