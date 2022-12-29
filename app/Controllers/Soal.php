<?php

namespace App\Controllers;

class Soal extends BaseController
{

    public function index()
    {
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $data = [
            'title' => 'Kelola Soal PPDB - ' . $konfigurasi['nama_web']
        ];
        return view('auth/soal/index', $data);
    }

    public function getdatasoal()
    {
        if ($this->request->isAJAX()) {
            $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
            $data = [
                'title' => 'Kelola Soal PPDB - ' . $konfigurasi['nama_web'],
                'list' => $this->soal->join('kategori_soal', 'kategori_soal.id_kategori=soal_ujian.id_kategori')->orderBy('kategori_soal.id_kategori', 'ASC')->orderBy('id_soal_ujian', 'ASC')->findAll()
            ];
            $msg = [
                'data' => view('auth/soal/list', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function formsoal()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Tambah Soal',
                'list' => $this->kategori->orderBy('id_kategori', 'ASC')->findAll()
            ];
            $msg = [
                'data' => view('auth/soal/tambah', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function simpansoal()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'id_kategori' => [
                    'label' => 'Kategori',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'pertanyaan' => [
                    'label' => 'Pertanyaan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'a' => [
                    'label' => 'Jawaban A',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'b' => [
                    'label' => 'Jawaban B',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'c' => [
                    'label' => 'Jawaban C',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'd' => [
                    'label' => 'Jawaban D',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'e' => [
                    'label' => 'Jawaban E',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'kunci_jawaban' => [
                    'label' => 'Kunci Jawaban',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'id_kategori'    => $validation->getError('id_kategori'),
                        'pertanyaan'     => $validation->getError('pertanyaan'),
                        'a'              => $validation->getError('a'),
                        'b'              => $validation->getError('b'),
                        'c'              => $validation->getError('c'),
                        'd'              => $validation->getError('d'),
                        'e'              => $validation->getError('e'),
                        'kunci_jawaban'  => $validation->getError('kunci_jawaban'),
                    ]
                ];
            } else {
                $simpandata = [
                    'id_kategori'       => $this->request->getVar('id_kategori'),
                    'pertanyaan'        => $this->request->getVar('pertanyaan'),
                    'a'                 => $this->request->getVar('a'),
                    'b'                 => $this->request->getVar('b'),
                    'c'                 => $this->request->getVar('c'),
                    'd'                 => $this->request->getVar('d'),
                    'e'                 => $this->request->getVar('e'),
                    'kunci_jawaban'     => $this->request->getVar('kunci_jawaban'),
                ];

                $this->soal->insert($simpandata);
                $msg = [
                    'sukses' => 'Data berhasil disimpan'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function formeditsoal()
    {
        if ($this->request->isAJAX()) {
            $id_soal_ujian = $this->request->getVar('id_soal_ujian');
            $list =  $this->soal->join('kategori_soal', 'kategori_soal.id_kategori=soal_ujian.id_kategori')->find($id_soal_ujian);
            $data = [
                'title'                   => 'List Soal',
                'id_soal_ujian'           => $list['id_soal_ujian'],
                'id_kategori'             => $list['id_kategori'],
                'nama_kategori'           => $list['nama_kategori'],
                'pertanyaan'              => $list['pertanyaan'],
                'a'                       => $list['a'],
                'b'                       => $list['b'],
                'c'                       => $list['c'],
                'd'                       => $list['d'],
                'e'                       => $list['e'],
                'kunci_jawaban'           => $list['kunci_jawaban'],
                'kategori'                => $this->kategori->orderBy('id_kategori', 'ASC')->findAll()
            ];
            $msg = [
                'sukses' => view('auth/soal/edit', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function updatesoal()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'id_kategori' => [
                    'label' => 'Kategori',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'pertanyaan' => [
                    'label' => 'Pertanyaan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'a' => [
                    'label' => 'Jawaban A',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'b' => [
                    'label' => 'Jawaban B',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'c' => [
                    'label' => 'Jawaban C',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'd' => [
                    'label' => 'Jawaban D',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'e' => [
                    'label' => 'Jawaban E',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'kunci_jawaban' => [
                    'label' => 'Kunci Jawaban',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'id_kategori'    => $validation->getError('id_kategori'),
                        'pertanyaan'     => $validation->getError('pertanyaan'),
                        'a'              => $validation->getError('a'),
                        'b'              => $validation->getError('b'),
                        'c'              => $validation->getError('c'),
                        'd'              => $validation->getError('d'),
                        'e'              => $validation->getError('e'),
                        'kunci_jawaban'  => $validation->getError('kunci_jawaban'),
                    ]
                ];
            } else {
                $updatedata = [
                    'id_kategori'       => $this->request->getVar('id_kategori'),
                    'pertanyaan'        => $this->request->getVar('pertanyaan'),
                    'a'                 => $this->request->getVar('a'),
                    'b'                 => $this->request->getVar('b'),
                    'c'                 => $this->request->getVar('c'),
                    'd'                 => $this->request->getVar('d'),
                    'e'                 => $this->request->getVar('e'),
                    'kunci_jawaban'     => $this->request->getVar('kunci_jawaban'),
                ];
                $id_soal_ujian = $this->request->getVar('id_soal_ujian');
                $this->soal->update($id_soal_ujian, $updatedata);
                $msg = [
                    'sukses' => 'Data berhasil diupdate'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function hapusoal()
    {
        if ($this->request->isAJAX()) {
            $id_soal_ujian = $this->request->getVar('id_soal_ujian');
            $this->soal->delete($id_soal_ujian);
            $msg = [
                'sukses' => 'Soal Berhasil Dihapus'
            ];

            echo json_encode($msg);
        }
    }

    //Kategori Soal
    public function kategori()
    {
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $data = [
            'title' => 'Kategori Soal - ' . $konfigurasi['nama_web']
        ];
        return view('auth/kategorisoal/index', $data);
    }

    public function getdatakategori()
    {
        if ($this->request->isAJAX()) {
            $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
            $data = [
                'title' => 'Kategori Soal - ' . $konfigurasi['nama_web'],
                'list' => $this->kategori->orderBy('id_kategori', 'ASC')->findAll()
            ];
            $msg = [
                'data' => view('auth/kategorisoal/list', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function formkategori()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Tambah Kategori',
            ];
            $msg = [
                'data' => view('auth/kategorisoal/tambah', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function simpankategori()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_kategori' => [
                    'label' => 'Nama Kategori',
                    'rules' => 'required|is_unique[kategori_soal.nama_kategori]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh sama',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_kategori'  => $validation->getError('nama_kategori'),
                    ]
                ];
            } else {
                $simpandata = [
                    'nama_kategori'     => $this->request->getVar('nama_kategori'),
                ];

                $this->kategori->insert($simpandata);
                $msg = [
                    'sukses' => 'Data berhasil disimpan'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function formeditkategori()
    {
        if ($this->request->isAJAX()) {
            $id_kategori = $this->request->getVar('id_kategori');
            $list =  $this->kategori->find($id_kategori);
            $data = [
                'title'                   => 'List Kategori',
                'id_kategori'             => $list['id_kategori'],
                'nama_kategori'           => $list['nama_kategori'],
            ];
            $msg = [
                'sukses' => view('auth/kategorisoal/edit', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function updatekategori()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_kategori' => [
                    'label' => 'Nama Kategori',
                    'rules' => 'required|is_unique[kategori_soal.id_kategori,nama_kategori,{nama_kategori}]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh sama',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_kategori'  => $validation->getError('nama_kategori'),
                    ]
                ];
            } else {
                $updatedata = [
                    'nama_kategori'   => $this->request->getVar('nama_kategori'),
                ];
                $id_kategori = $this->request->getVar('id_kategori');
                $this->kategori->update($id_kategori, $updatedata);
                $msg = [
                    'sukses' => 'Data berhasil diupdate'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function hapuskategori()
    {
        if ($this->request->isAJAX()) {
            $id_kategori = $this->request->getVar('id_kategori');
            $this->kategori->delete($id_kategori);
            $msg = [
                'sukses' => 'Kategori Berhasil Dihapus'
            ];

            echo json_encode($msg);
        }
    }
}
