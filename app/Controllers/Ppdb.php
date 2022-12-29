<?php

namespace App\Controllers;

use Config\Services;

class Ppdb extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $data = [
            'title' => 'Pendaftaran - ' . $konfigurasi['nama_web']
        ];
        return view('ppdb/daftar/list', $data);
    }

    public function simpan()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nisn' => [
                    'label' => 'Nisn',
                    'rules' => 'required|is_unique[ppdb.nisn]|min_length[5]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} sudah tersedia.',
                        'min_length' => '{field} minimal 5',
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama_lengkap' => [
                    'label' => 'Nama Lengkap',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tgl_lahir' => [
                    'label' => 'Tanggal Lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tmp_lahir' => [
                    'label' => 'Tempat Lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jenkel' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'agama' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'asal_sekolah' => [
                    'label' => 'Asal Sekolah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama_ayah' => [
                    'label' => 'Nama Ayah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama_ibu' => [
                    'label' => 'Nama Ibu',
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
                'jenis_tinggal' => [
                    'label' => 'Jenis Tinggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'transportasi' => [
                    'label' => 'Transportasi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'no_telp' => [
                    'label' => 'No Telp',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jurusan' => [
                    'label' => 'Jurusan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nisn' => $validation->getError('nisn'),
                        'password' => $validation->getError('password'),
                        'nama_lengkap' => $validation->getError('nama_lengkap'),
                        'tgl_lahir' => $validation->getError('tgl_lahir'),
                        'tmp_lahir' => $validation->getError('tmp_lahir'),
                        'jenkel' => $validation->getError('jenkel'),
                        'agama' => $validation->getError('agama'),
                        'asal_sekolah' => $validation->getError('asal_sekolah'),
                        'jenis_tinggal' => $validation->getError('jenis_tinggal'),
                        'nama_ayah' => $validation->getError('nama_ayah'),
                        'nama_ibu' => $validation->getError('nama_ibu'),
                        'transportasi' => $validation->getError('transportasi'),
                        'alamat' => $validation->getError('alamat'),
                        'no_telp' => $validation->getError('no_telp'),
                        'jurusan' => $validation->getError('jurusan'),
                    ]
                ];
            } else {
                $count = $this->ppdb->selectCount('ppdb_id')->first();
                if ($count['ppdb_id'] <= 100) {
                    $gelombang = 1;
                } else {
                    $gelombang = 2;
                }
                $simpandata = [
                    'nisn'                  => $this->request->getVar('nisn'),
                    'password'              => (password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)),
                    'nama_lengkap'          => $this->request->getVar('nama_lengkap'),
                    'tgl_lahir'             => $this->request->getVar('tgl_lahir'),
                    'tmp_lahir'             => $this->request->getVar('tmp_lahir'),
                    'jenkel'                => $this->request->getVar('jenkel'),
                    'agama'                 => $this->request->getVar('agama'),
                    'nama_ayah'             => $this->request->getVar('nama_ayah'),
                    'nama_ibu'              => $this->request->getVar('nama_ibu'),
                    'alamat'                => $this->request->getVar('alamat'),
                    'jenis_tinggal'         => $this->request->getVar('jenis_tinggal'),
                    'asal_sekolah'          => $this->request->getVar('asal_sekolah'),
                    'transportasi'          => $this->request->getVar('transportasi'),
                    'no_telp'               => $this->request->getVar('no_telp'),
                    'jurusan'               => $this->request->getVar('jurusan'),
                    'foto_siswa'            => $this->request->getVar('foto_siswa'),
                    'foto_ijazah'           => $this->request->getVar('foto_ijazah'),
                    'bukti_pembayaran'      => 'default.png',
                    'status_pembayaran'     => '0',
                    'tgl_daftar'            => $this->request->getVar('tgl_daftar'),
                    'gelombang_id'          => $gelombang,
                    'status'                => $this->request->getVar('status'),
                    'status_ujian_selesai'  => 1,
                ];

                $this->ppdb->insert($simpandata);
                session()->setFlashdata('pesan', 'Jangan lupa mengganti password!');
                $msg = [
                    'sukses' => 'Data berhasil dikirim!'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function login()
    {
        if (session('login')) {
            session()->setFlashdata('pesan_gagal', 'Anda sudah login!');
            return redirect()->to('/ppdb/profile');
        }
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $data = [
            'title' => 'Login PPDB - ' . $konfigurasi['nama_web']
        ];
        return view('ppdb/login/login', $data);
    }

    public function validasi()
    {
        if ($this->request->isAJAX()) {
            $nisn = $this->request->getVar('nisn');
            $password = $this->request->getVar('password');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'nisn' => [
                    'label' => 'Nisn',
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
                        'nisn' => $validation->getError('nisn'),
                        'password' => $validation->getError('password')
                    ]
                ];
            } else {

                //cek user
                $query_cekuser = $this->db->query("SELECT * FROM ppdb WHERE nisn='$nisn'");

                $result = $query_cekuser->getResult();

                if (count($result) > 0) {
                    $row = $query_cekuser->getRow();
                    $password_user = $row->password;

                    if (password_verify($password, $password_user)) {
                        $simpan_session = [
                            'login' => true,
                            'ppdb_id' => $row->ppdb_id,
                            'nisn'   => $nisn,
                            'password'   => $row->password,
                            'nama_lengkap'  => $row->nama_lengkap,
                            'foto_siswa' => $row->foto_siswa,
                        ];

                        $this->session->set($simpan_session);

                        $msg = [
                            'sukses' => [
                                'link' => '/ppdb/profile'
                            ]
                        ];
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
                            'nisn' => 'Nisn tidak ditemukan!'
                        ]
                    ];
                }
            }

            echo json_encode($msg);
        }
    }

    public function ujian()
    {
        if (!session()->get('ppdb_id')) {
            return redirect()->to('login');
        }
        $id          = session()->get('ppdb_id');
        $list        =  $this->ppdb->join('jadwal_ujian', 'jadwal_ujian.gelombang_id=ppdb.gelombang_id')->find($id);
        if ($list['status_ujian_proses'] == 2) {
            return redirect()->to('profile');
        }
        $konfigurasi      = $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $soal_ujian       = $this->soal->join('kategori_soal', 'kategori_soal.id_kategori=soal_ujian.id_kategori')->orderBy('nama_kategori', 'DESC')->orderBy('rand()')->findAll(100);
        // $soal_ujian       = $this->soal->join('kategori_soal', 'kategori_soal.id_kategori=soal_ujian.id_kategori')->orderBy('nama_kategori', 'DESC')->findAll();
        // $total_soal       = $this->soal->selectCount('id_soal_ujian')->first();
        $total_soal       = count($soal_ujian);
        $data = array(
            'status_ujian_proses' => 1,
            'status' => 'Tes',
        );
        $this->ppdb->update($id, $data);
        $data = [
            'title'              => 'Ujian Kompetensi - ' . $konfigurasi['nama_web'],
            'ppdb_id'            => $list['ppdb_id'],
            'soal_ujian'         => $soal_ujian,
            'total_soal'         => $total_soal,
            'max_time'           => $list['timer_ujian'],
            'jam_ujian'          => $list['jam_ujian']
        ];
        return view('ppdb/login/ujian', $data);
    }

    public function jawab()
    {
        $id          = session()->get('ppdb_id');
        $jumlah = $this->request->getVar('jumlah_soal');
        $soal = $this->request->getVar('soal');
        $jawaban = $this->request->getVar('jawaban');
        if ($jawaban == null) {
            $data = array(
                'benar' => 0,
                'salah' => 0,
                'nilai' => 0,
                'status_ujian_proses' => 2,
                'status_ujian_selesai' => 2,
            );
            $this->ppdb->update($id, $data);

            return redirect()->to('profile');
        }
        for ($i = 0; $i < $jumlah; $i++) {
            $nomor = $soal[$i];
            $jawaban[$nomor];
            $data[] = array(
                'id_ppdb' => $id,
                'id_soal_ujian' => $nomor,
                'jawaban' => $jawaban[$nomor],
                'skor'      => 0
            );
        }

        $this->jawaban->insertBatch($data);

        $soal_ujian  = $this->jawaban->join('soal_ujian', 'soal_ujian.id_soal_ujian=jawaban_ujian.id_soal_ujian')->where('id_ppdb', $id)->findAll();
        foreach ($soal_ujian as $d) {
            if ($d['jawaban'] == $d['kunci_jawaban']) {
                $data = array(
                    'skor' => 1,
                );
                $this->jawaban->update($d['id_jawaban'], $data);
            } else {
                $data = array(
                    'skor' => 0,
                );
                $this->jawaban->update($d['id_jawaban'], $data);
            }
        }
        $benar       = 0;
        $salah       = 0;
        $total_nilai = 0;
        $jumlah  = $this->jawaban->join('soal_ujian', 'soal_ujian.id_soal_ujian=jawaban_ujian.id_soal_ujian')->where('id_ppdb', $id)->selectCount('id_jawaban')->first();
        $check = $this->db->query('SELECT id_jawaban, jawaban, skor, soal_ujian.kunci_jawaban FROM jawaban_ujian join soal_ujian ON jawaban_ujian.id_soal_ujian=soal_ujian.id_soal_ujian WHERE id_ppdb="' . $id . '"')->getResultArray();

        foreach ($check as $c) {
            if ($c['jawaban'] == $c['kunci_jawaban']) {
                $benar++;
            } else {
                $salah++;
            }
            $total_nilai += $c['skor'] / $jumlah['id_jawaban'] * 100;
        }

        $tot_nilai = round($total_nilai);
        if ($tot_nilai > 65)
        {
            $status = 'Lulus';
        } else {
            $status = 'Gagal';
        }

        $data = array(
            'benar' => $benar,
            'salah' => $salah,
            'nilai' => round($total_nilai),
            'status_ujian_proses' => 2,
            'status_ujian_selesai' => 2,
            'status' => $status,
        );
        $this->ppdb->update($id, $data);

        return redirect()->to('profile');
    }

    public function ubahpassword()
    {
        if (!session()->get('ppdb_id')) {
            return redirect()->to('login');
        }
        $id = session()->get('ppdb_id');
        $list =  $this->ppdb->find($id);
        if ($list['status_ujian_proses'] == 1) {
            return redirect()->to('ujian');
        }
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $data = [
            'title'     => 'Ubah Password Peserta - ' . $konfigurasi['nama_web'],
            'ppdb_id'   => $list['ppdb_id'],
        ];
        return view('ppdb/login/ubahpassword', $data);
    }

    public function editpassword()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'oldpassword' => [
                    'label' => 'Password Lama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'confirm' => [
                    'label' => 'Konfirmasi Password',
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'matches' => '{field} tidak sama',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'oldpassword'   => $validation->getError('oldpassword'),
                        'password'      => $validation->getError('password'),
                        'confirm'       => $validation->getError('confirm'),
                    ],

                ];
            } else {
                $id = session()->get('ppdb_id');
                $get =  $this->ppdb->find($id);
                $currentpass = $get['password'];
                $oldpassword = $this->request->getVar('oldpassword');
                if (password_verify($oldpassword,  $currentpass)) {
                    $simpandata = [
                        'password'     => (password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)),
                    ];
                    $ppdb_id = $this->request->getVar('ppdb_id');
                    $this->ppdb->update($ppdb_id, $simpandata);
                    session()->setFlashdata('success', 'Password berhasil diubah!');
                } else {
                    session()->setFlashdata('gagal', 'Password lama salah!');
                }
                $msg = [
                    'sukses' => 'Password berhasil diubah!'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function profile()
    {
        if (!session()->get('ppdb_id')) {
            return redirect()->to('login');
        }
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $id = session()->get('ppdb_id');
        $list =  $this->ppdb->join('jadwal_ujian', 'jadwal_ujian.gelombang_id = ppdb.gelombang_id')->find($id);
        $test =  $this->ppdb->join('file_pengumuman', 'file_pengumuman.gelombang_id = ppdb.gelombang_id')->find($id);
        if ($list['status_ujian_proses'] == 1) {
            return redirect()->to('ujian');
        }
        if ($test == null) {
            $file_pdf = null;
            $nama_gelombang = null;
        } else {
            $file_pdf = $test['file_pdf'];
            $nama_gelombang = $test['gelombang_id'];
        }
        $data = [
            'title'              => 'PPDB - Profile',
            'ppdb_id'            => $list['ppdb_id'],
            'nisn'               => $list['nisn'],
            'nama_lengkap'       => $list['nama_lengkap'],
            'nama_panggilan'     => $list['nama_panggilan'],
            'tgl_lahir'          => $list['tgl_lahir'],
            'tmp_lahir'          => $list['tmp_lahir'],
            'jenkel'             => $list['jenkel'],
            'asal_sekolah'       => $list['asal_sekolah'],
            'nama_ayah'          => $list['nama_ayah'],
            'nama_ibu'           => $list['nama_ibu'],
            'agama'              => $list['agama'],
            'transportasi'       => $list['transportasi'],
            'jenis_tinggal'      => $list['jenis_tinggal'],
            'alamat'             => $list['alamat'],
            'no_telp'            => $list['no_telp'],
            'jurusan'            => $list['jurusan'],
            'foto_siswa'         => $list['foto_siswa'],
            'foto_ijazah'        => $list['foto_ijazah'],
            'bukti_pembayaran'   => $list['bukti_pembayaran'],
            'status_pembayaran'  => $list['status_pembayaran'],
            'status'             => $list['status'],
            'kewarganegaraan'    => $list['kewarganegaraan'],
            'anak_keberapa'      => $list['anak_keberapa'],
            'jumlah_kandung'     => $list['jumlah_kandung'],
            'jumlah_tiri'        => $list['jumlah_tiri'],
            'jumlah_angkat'      => $list['jumlah_angkat'],
            'yatim_piatu'        => $list['yatim_piatu'],
            'bahasa'             => $list['bahasa'],
            'jarak_tempuh'       => $list['jarak_tempuh'],
            'golongan_darah'     => $list['golongan_darah'],
            'penyakit_diderita'  => $list['penyakit_diderita'],
            'kelainan_jasmani'   => $list['kelainan_jasmani'],
            'tinggi_berat'       => $list['tinggi_berat'],
            'gelombang'          => $file_pdf,
            'nama_gelombang'     => $nama_gelombang,
            'nama_rekening'      => $konfigurasi['nama_rek'],
            'nomor_rekening'     => $konfigurasi['no_rek'],
            'tanggal_ujian'      => $list['tanggal_ujian'],
            'jam_ujian'          => $list['jam_ujian'],
            'timer_ujian'        => $list['timer_ujian'],
        ];
        return view('ppdb/login/profile', $data);
    }

    public function editprofile()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nisn' => [
                    'label' => 'Nisn',
                    'rules' => 'required|alpha_numeric_space',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'alpha_numeric_space' => 'Tidak boleh mengandung karakter unik',
                    ]
                ],
                'nama_lengkap' => [
                    'label' => 'Nama Lengkap',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama_panggilan' => [
                    'label' => 'Nama Panggilan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'kewarganegaraan' => [
                    'label' => 'Kewarganegaraan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tgl_lahir' => [
                    'label' => 'Tanggal Lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tmp_lahir' => [
                    'label' => 'Tempat Lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jenkel' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'agama' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'asal_sekolah' => [
                    'label' => 'Asal Sekolah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama_ayah' => [
                    'label' => 'Nama Ayah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama_ibu' => [
                    'label' => 'Nama Ibu',
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
                'jenis_tinggal' => [
                    'label' => 'Jenis Tinggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'transportasi' => [
                    'label' => 'Transportasi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'no_telp' => [
                    'label' => 'No Telp',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jurusan' => [
                    'label' => 'Jurusan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jarak_tempuh' => [
                    'label' => 'Jarak Tempuh',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'anak_keberapa' => [
                    'label' => 'Anak Keberapa',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jumlah_kandung' => [
                    'label' => 'Jumlah Saudara Kandung',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jumlah_tiri' => [
                    'label' => 'Jumlah Saudara Tiri',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jumlah_angkat' => [
                    'label' => 'Jumlah Saudara Angkat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'yatim_piatu' => [
                    'label' => 'Anak Yatim/Piatu',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'penyakit_diderita' => [
                    'label' => 'Penyakit yang pernah di derita',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'kelainan_jasmani' => [
                    'label' => 'Kelainan Jasmani',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'bahasa' => [
                    'label' => 'Bahasa',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'golongan_darah' => [
                    'label' => 'Golongan Darah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tinggi_berat' => [
                    'label' => 'Tinggi & Berat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nisn'               => $validation->getError('nisn'),
                        'nama_lengkap'       => $validation->getError('nama_lengkap'),
                        'nama_panggilan'     => $validation->getError('nama_panggilan'),
                        'tgl_lahir'          => $validation->getError('tgl_lahir'),
                        'tmp_lahir'          => $validation->getError('tmp_lahir'),
                        'jenkel'             => $validation->getError('jenkel'),
                        'agama'              => $validation->getError('agama'),
                        'asal_sekolah'       => $validation->getError('asal_sekolah'),
                        'jenis_tinggal'      => $validation->getError('jenis_tinggal'),
                        'nama_ayah'          => $validation->getError('nama_ayah'),
                        'nama_ibu'           => $validation->getError('nama_ibu'),
                        'transportasi'       => $validation->getError('transportasi'),
                        'alamat'             => $validation->getError('alamat'),
                        'no_telp'            => $validation->getError('no_telp'),
                        'jurusan'            => $validation->getError('jurusan'),
                        'kewarganegaraan'    => $validation->getError('kewarganegaraan'),
                        'jarak_tempuh'       => $validation->getError('jarak_tempuh'),
                        'anak_keberapa'      => $validation->getError('anak_keberapa'),
                        'jumlah_kandung'     => $validation->getError('jumlah_kandung'),
                        'jumlah_tiri'        => $validation->getError('jumlah_tiri'),
                        'jumlah_angkat'      => $validation->getError('jumlah_angkat'),
                        'yatim_piatu'        => $validation->getError('yatim_piatu'),
                        'penyakit_diderita'  => $validation->getError('penyakit_diderita'),
                        'kelainan_jasmani'   => $validation->getError('kelainan_jasmani'),
                        'bahasa'             => $validation->getError('bahasa'),
                        'golongan_darah'     => $validation->getError('golongan_darah'),
                        'tinggi_berat'       => $validation->getError('tinggi_berat'),
                    ]
                ];
            } else {
                $simpandata = [
                    'nisn'                  => $this->request->getVar('nisn'),
                    'nama_lengkap'          => $this->request->getVar('nama_lengkap'),
                    'nama_panggilan'        => $this->request->getVar('nama_panggilan'),
                    'tgl_lahir'             => $this->request->getVar('tgl_lahir'),
                    'tmp_lahir'             => $this->request->getVar('tmp_lahir'),
                    'jenkel'                => $this->request->getVar('jenkel'),
                    'agama'                 => $this->request->getVar('agama'),
                    'asal_sekolah'          => $this->request->getVar('asal_sekolah'),
                    'jenis_tinggal'         => $this->request->getVar('jenis_tinggal'),
                    'nama_ayah'             => $this->request->getVar('nama_ayah'),
                    'nama_ibu'              => $this->request->getVar('nama_ibu'),
                    'alamat'                => $this->request->getVar('alamat'),
                    'transportasi'          => $this->request->getVar('transportasi'),
                    'no_telp'               => $this->request->getVar('no_telp'),
                    'jurusan'               => $this->request->getVar('jurusan'),
                    'kewarganegaraan'       => $this->request->getVar('kewarganegaraan'),
                    'jarak_tempuh'          => $this->request->getVar('jarak_tempuh'),
                    'anak_keberapa'         => $this->request->getVar('anak_keberapa'),
                    'jumlah_kandung'        => $this->request->getVar('jumlah_kandung'),
                    'jumlah_tiri'           => $this->request->getVar('jumlah_tiri'),
                    'jumlah_angkat'         => $this->request->getVar('jumlah_angkat'),
                    'yatim_piatu'           => $this->request->getVar('yatim_piatu'),
                    'penyakit_diderita'     => $this->request->getVar('penyakit_diderita'),
                    'kelainan_jasmani'      => $this->request->getVar('kelainan_jasmani'),
                    'bahasa'                => $this->request->getVar('bahasa'),
                    'golongan_darah'        => $this->request->getVar('golongan_darah'),
                    'tinggi_berat'          => $this->request->getVar('tinggi_berat'),
                ];
                $ppdb_id = $this->request->getVar('ppdb_id');
                $this->ppdb->update($ppdb_id, $simpandata);
                $msg = [
                    'sukses' => 'Data berhasil diupdate'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function formuploadijazah()
    {
        if ($this->request->isAJAX()) {
            $ppdb_id = $this->request->getVar('ppdb_id');
            $list =  $this->ppdb->find($ppdb_id);
            $data = [
                'title' => 'Upload Scan Ijazah',
                'list'  => $list,
                'ppdb_id' => $list['ppdb_id']
            ];
            $msg = [
                'sukses' => view('ppdb/login/uploadijazah', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function douploadijazah()
    {
        if ($this->request->isAJAX()) {

            $ppdb_id = $this->request->getVar('ppdb_id');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'foto_ijazah' => [
                    'label' => 'Upload Foto',
                    'rules' => 'uploaded[foto_ijazah]|mime_in[foto_ijazah,image/png,image/jpg,image/jpeg]|is_image[foto_ijazah]',
                    'errors' => [
                        'uploaded' => 'Masukkan Foto',
                        'mime_in' => 'Harus Foto!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'foto_ijazah' => $validation->getError('foto_ijazah')
                    ]
                ];
            } else {
                //check
                $cekdata = $this->ppdb->find($ppdb_id);
                $fotolama = $cekdata['foto_ijazah'];
                if ($fotolama != 'default.png') {
                    unlink('img/ppdb/ijazah/' . $fotolama);
                    unlink('img/ppdb/ijazah/thumb/' . 'thumb_' . $fotolama);
                }

                $filegambar = $this->request->getFile('foto_ijazah');

                $updatedata = [
                    'foto_ijazah' => 'Ijazah' . '_' . $cekdata['nisn'] . '.' . $filegambar->guessExtension(),
                ];

                $this->ppdb->update($ppdb_id, $updatedata);

                \Config\Services::image()
                    ->withFile($filegambar)
                    ->fit(250, 250, 'center')
                    ->save('img/ppdb/ijazah/thumb/' . 'thumb_' .  'Ijazah' . '_' . $cekdata['nisn'] . '.' . $filegambar->guessExtension());
                \Config\Services::image()
                    ->withFile($filegambar)
                    ->save('img/ppdb/ijazah/' .  'Ijazah' . '_' . $cekdata['nisn'] . '.' . $filegambar->guessExtension());
                $msg = [
                    'sukses' => 'Foto berhasil diupload!',
                ];
            }
            echo json_encode($msg);
        }
    }

    public function formuploadpembayaran()
    {
        if ($this->request->isAJAX()) {
            $ppdb_id = $this->request->getVar('ppdb_id');
            $list =  $this->ppdb->find($ppdb_id);
            $data = [
                'title' => 'Upload Bukti Pembayaran',
                'list'  => $list,
                'ppdb_id' => $list['ppdb_id']
            ];
            $msg = [
                'sukses' => view('ppdb/login/uploadpembayaran', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function douploadpembayaran()
    {
        if ($this->request->isAJAX()) {

            $ppdb_id = $this->request->getVar('ppdb_id');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'bukti_pembayaran' => [
                    'label' => 'Upload Foto',
                    'rules' => 'uploaded[bukti_pembayaran]|mime_in[bukti_pembayaran,image/png,image/jpg,image/jpeg]|is_image[bukti_pembayaran]',
                    'errors' => [
                        'uploaded' => 'Masukkan Foto',
                        'mime_in' => 'Harus Foto!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'bukti_pembayaran' => $validation->getError('bukti_pembayaran')
                    ]
                ];
            } else {
                //check
                $cekdata = $this->ppdb->find($ppdb_id);
                $fotolama = $cekdata['bukti_pembayaran'];
                if ($fotolama != 'default.png') {
                    unlink('img/ppdb/bukti_pembayaran/' . $fotolama);
                    unlink('img/ppdb/bukti_pembayaran/thumb/' . 'thumb_' . $fotolama);
                }

                $filegambar = $this->request->getFile('bukti_pembayaran');

                $updatedata = [
                    'bukti_pembayaran' => 'bukti_pembayaran' . '_' . $cekdata['nisn'] . '.' . $filegambar->guessExtension(),
                    'status_pembayaran' => '1'
                ];

                $this->ppdb->update($ppdb_id, $updatedata);

                \Config\Services::image()
                    ->withFile($filegambar)
                    ->fit(250, 250, 'center')
                    ->save('img/ppdb/bukti_pembayaran/thumb/' . 'thumb_' .  'bukti_pembayaran' . '_' . $cekdata['nisn'] . '.' . $filegambar->guessExtension());
                \Config\Services::image()
                    ->withFile($filegambar)
                    ->save('img/ppdb/bukti_pembayaran/' .  'bukti_pembayaran' . '_' . $cekdata['nisn'] . '.' . $filegambar->guessExtension());
                $msg = [
                    'sukses' => 'Foto berhasil diupload!',
                ];
            }
            echo json_encode($msg);
        }
    }

    public function formuploadfoto()
    {
        if ($this->request->isAJAX()) {
            $ppdb_id = $this->request->getVar('ppdb_id');
            $list =  $this->ppdb->find($ppdb_id);
            $data = [
                'title' => 'Upload Foto',
                'list'  => $list,
                'ppdb_id' => $list['ppdb_id']
            ];
            $msg = [
                'sukses' => view('ppdb/login/uploadfoto', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function douploadfoto()
    {
        if ($this->request->isAJAX()) {

            $ppdb_id = $this->request->getVar('ppdb_id');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'foto_siswa' => [
                    'label' => 'Upload Foto',
                    'rules' => 'uploaded[foto_siswa]|mime_in[foto_siswa,image/png,image/jpg,image/jpeg]|is_image[foto_siswa]',
                    'errors' => [
                        'uploaded' => 'Masukkan Foto',
                        'mime_in' => 'Harus Foto!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'foto_siswa' => $validation->getError('foto_siswa')
                    ]
                ];
            } else {
                //check
                $cekdata = $this->ppdb->find($ppdb_id);
                $fotolama = $cekdata['foto_siswa'];
                if ($fotolama != 'default.png') {
                    unlink('img/ppdb/' . $fotolama);
                    unlink('img/ppdb/thumb/' . 'thumb_' . $fotolama);
                }
                $filegambar = $this->request->getFile('foto_siswa');
                $updatedata = [
                    'foto_siswa' => $cekdata['nama_lengkap'] . '_' . $cekdata['nisn'] . '.' . $filegambar->guessExtension(),
                ];
                $this->ppdb->update($ppdb_id, $updatedata);
                \Config\Services::image()
                    ->withFile($filegambar)
                    ->fit(250, 250, 'center')
                    ->save('img/ppdb/thumb/' . 'thumb_' .  $cekdata['nama_lengkap'] . '_' . $cekdata['nisn'] . '.' . $filegambar->guessExtension());
                \Config\Services::image()
                    ->withFile($filegambar)
                    ->save('img/ppdb/' .  $cekdata['nama_lengkap'] . '_' . $cekdata['nisn'] . '.' . $filegambar->guessExtension());
                $msg = [
                    'sukses' => 'Foto berhasil diupload!',
                ];
            }
            echo json_encode($msg);
        }
    }

    public function cetak()
    {
        $id = session()->get('ppdb_id');
        $list =  $this->ppdb->getsiswa($id);
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
        if (!isset($list)) return redirect()->to('/ppdb');
        $data = [
            'title'          => 'PPDB - ' . $konfigurasi['nama_web'],
            'ppdb_id'        => $list->ppdb_id,
            'nisn'           => $list->nisn,
            'nama_lengkap'   => $list->nama_lengkap,
            'jenkel'         => $list->jenkel,
            'agama'          => $list->agama,
            'jurusan'        => $list->jurusan,
            'alamat'         => $list->alamat,
            'no_telp'        => $list->no_telp,
            'asal_sekolah'   => $list->asal_sekolah,
            'tgl_daftar'     => $list->tgl_daftar,
            'tgl_lahir'      => $list->tgl_lahir,
            'tmp_lahir'      => $list->tmp_lahir,
        ];
        return view('ppdb/login/cetak', $data);
    }

    public function logout()
    {
        $id = session()->get('ppdb_id');
        $list =  $this->ppdb->find($id);
        if ($list['status_ujian_proses'] == 1) {
            return redirect()->to('ujian');
        }
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
