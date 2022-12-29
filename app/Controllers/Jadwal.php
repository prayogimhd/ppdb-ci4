<?php

namespace App\Controllers;

class Jadwal extends BaseController
{

    public function index()
    {
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $data = [
            'title' => 'Jadwal Ujian - ' . $konfigurasi['nama_web']
        ];
        return view('auth/jadwal/index', $data);
    }

    public function getdatajadwal()
    {
        if ($this->request->isAJAX()) {
            $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
            $data = [
                'title' => 'Jadwal Ujian - ' . $konfigurasi['nama_web'],
                'list' => $this->jadwal->orderBy('id_jadwal', 'ASC')->findAll()
            ];
            $msg = [
                'data' => view('auth/jadwal/list', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function formjadwal()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Tambah Jadwal',
                'list' => $this->jadwal->orderBy('id_jadwal', 'ASC')->findAll()
            ];
            $msg = [
                'data' => view('auth/jadwal/tambah', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function simpanjadwal()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'gelombang_id' => [
                    'label' => 'Gelombang',
                    'rules' => 'required|is_unique[jadwal_ujian.gelombang_id]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh sama',
                    ]
                ],
                'tanggal_ujian' => [
                    'label' => 'Tanggal Ujian',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jam_ujian' => [
                    'label' => 'Jam Ujian',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'durasi_ujian' => [
                    'label' => 'Durasi Ujian',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'gelombang_id'  => $validation->getError('gelombang_id'),
                        'tanggal_ujian' => $validation->getError('tanggal_ujian'),
                        'jam_ujian'     => $validation->getError('jam_ujian'),
                        'durasi_ujian'  => $validation->getError('durasi_ujian'),
                    ]
                ];
            } else {
                $simpandata = [
                    'gelombang_id'      => $this->request->getVar('gelombang_id'),
                    'tanggal_ujian'     => $this->request->getVar('tanggal_ujian'),
                    'jam_ujian'         => $this->request->getVar('jam_ujian'),
                    'durasi_ujian'      => $this->request->getVar('durasi_ujian'),
                    'timer_ujian'       => $this->request->getVar('durasi_ujian') * 60
                ];

                $this->jadwal->insert($simpandata);
                $msg = [
                    'sukses' => 'Data berhasil disimpan'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function formeditjadwal()
    {
        if ($this->request->isAJAX()) {
            $id_jadwal = $this->request->getVar('id_jadwal');
            $list =  $this->jadwal->find($id_jadwal);
            $data = [
                'title'                   => 'List Soal',
                'id_jadwal'               => $list['id_jadwal'],
                'gelombang_id'            => $list['gelombang_id'],
                'tanggal_ujian'           => $list['tanggal_ujian'],
                'jam_ujian'               => $list['jam_ujian'],
                'durasi_ujian'            => $list['durasi_ujian'],
            ];
            $msg = [
                'sukses' => view('auth/jadwal/edit', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function updatejadwal()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'gelombang_id' => [
                    'label' => 'Gelombang',
                    'rules' => 'required|is_unique[jadwal_ujian.gelombang_id,gelombang_id,{gelombang_id}]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh sama',
                    ]
                ],
                'tanggal_ujian' => [
                    'label' => 'Tanggal Ujian',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jam_ujian' => [
                    'label' => 'Jam Ujian',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'durasi_ujian' => [
                    'label' => 'Durasi Ujian',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'gelombang_id'  => $validation->getError('gelombang_id'),
                        'tanggal_ujian' => $validation->getError('tanggal_ujian'),
                        'jam_ujian'     => $validation->getError('jam_ujian'),
                        'durasi_ujian'  => $validation->getError('durasi_ujian'),
                    ]
                ];
            } else {
                $updatedata = [
                    'gelombang_id'      => $this->request->getVar('gelombang_id'),
                    'tanggal_ujian'     => $this->request->getVar('tanggal_ujian'),
                    'jam_ujian'         => $this->request->getVar('jam_ujian'),
                    'durasi_ujian'      => $this->request->getVar('durasi_ujian'),
                    'timer_ujian'       => $this->request->getVar('durasi_ujian') * 60
                ];
                $id_jadwal = $this->request->getVar('id_jadwal');
                $this->jadwal->update($id_jadwal, $updatedata);
                $msg = [
                    'sukses' => 'Data berhasil diupdate'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function hapusjadwal()
    {
        if ($this->request->isAJAX()) {
            $id_jadwal = $this->request->getVar('id_jadwal');
            $this->jadwal->delete($id_jadwal);
            $msg = [
                'sukses' => 'Jadwal Berhasil Dihapus'
            ];

            echo json_encode($msg);
        }
    }

}
