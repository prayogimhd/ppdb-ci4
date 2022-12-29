<?php

namespace App\Controllers;

use Config\Services;

class Siswa extends BaseController
{

    //PPDB Backend
    public function ppdb()
    {
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $data = [
            'title' => 'List Peserta PPDB - ' . $konfigurasi['nama_web']
        ];
        return view('auth/ppdb/index', $data);
    }

    public function getdatappdb()
    {
        if ($this->request->isAJAX()) {
            $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
            $data = [
                'title' => 'List Peserta PPDB - ' . $konfigurasi['nama_web'],
                'list' => $this->ppdb->orderBy('ppdb_id', 'DESC')->findAll()
            ];
            $msg = [
                'data' => view('auth/ppdb/list', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function formeditppdb()
    {
        if ($this->request->isAJAX()) {
            $ppdb_id = $this->request->getVar('ppdb_id');
            $list =  $this->ppdb->find($ppdb_id);
            $data = [
                'title'             => 'Detail Pendaftar',
                'ppdb_id'           => $list['ppdb_id'],
                'nisn'              => $list['nisn'],
                'jurusan'           => $list['jurusan'],
                'agama'             => $list['agama'],
                'jenkel'            => $list['jenkel'],
                'nama_lengkap'      => $list['nama_lengkap'],
                'alamat'            => $list['alamat'],
                'tgl_lahir'         => $list['tgl_lahir'],
                'tmp_lahir'         => $list['tmp_lahir'],
                'asal_sekolah'      => $list['asal_sekolah'],
                'transportasi'      => $list['transportasi'],
                'jenis_tinggal'     => $list['jenis_tinggal'],
                'no_telp'           => $list['no_telp'],
                'nama_ayah'         => $list['nama_ayah'],
                'nama_ibu'          => $list['nama_ibu'],
                'foto_siswa'        => $list['foto_siswa'],
                'foto_ijazah'       => $list['foto_ijazah'],
                'bukti_pembayaran'  => $list['bukti_pembayaran'],
                'benar'             => $list['benar'],
                'salah'             => $list['salah'],
                'nilai'             => $list['nilai'],
                // 'status'            => $list['status'],
                // 'tgl_tes'           => $list['tgl_tes'],

            ];
            $msg = [
                'sukses' => view('auth/ppdb/edit', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function updateppdb()
    {
        if ($this->request->isAJAX()) {
            $updatedata = [
                'nisn'      => $this->request->getVar('nisn'),
                'jurusan'   => $this->request->getVar('jurusan'),
                'agama'     => $this->request->getVar('agama'),
                'jenkel'        => $this->request->getVar('jenkel'),
                'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                'alamat' => $this->request->getVar('alamat'),
                'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                'tmp_lahir' => $this->request->getVar('tmp_lahir'),
                'asal_sekolah' => $this->request->getVar('asal_sekolah'),
                'transportasi' => $this->request->getVar('transportasi'),
                'nama_ayah' => $this->request->getVar('nama_ayah'),
                'nama_ibu' => $this->request->getVar('nama_ibu'),
                'jenis_tinggal' => $this->request->getVar('jenis_tinggal'),
                'no_telp' => $this->request->getVar('no_telp'),
                // 'status' => $this->request->getVar('status'),
                // 'tgl_tes' => $this->request->getVar('tgl_tes'),
            ];
            // dd($this->request->getVar('tgl_tes'));
            $ppdb_id = $this->request->getVar('ppdb_id');
            $this->ppdb->update($ppdb_id, $updatedata);
            $msg = [
                'sukses' => 'Data berhasil diupdate'
            ];
            echo json_encode($msg);
        }
    }

    public function hapusppdb()
    {
        if ($this->request->isAJAX()) {
            $ppdb_id = $this->request->getVar('ppdb_id');
            //check
            $cekdata = $this->ppdb->find($ppdb_id);
            $fotosiswa = $cekdata['foto_siswa'];
            $fotoijazah = $cekdata['foto_ijazah'];
            $bukti_pembayaran = $cekdata['bukti_pembayaran'];
            if ($fotosiswa != 'default.png') {
                unlink('img/ppdb/' . $fotosiswa);
                unlink('img/ppdb/thumb/' . 'thumb_' . $fotosiswa);
            }
            if ($fotoijazah != 'default.png') {
                unlink('img/ppdb/ijazah/' . $fotoijazah);
                unlink('img/ppdb/ijazah/thumb/' . 'thumb_' . $fotoijazah);
            }
            if ($bukti_pembayaran != 'default.png') {
                unlink('img/ppdb/bukti_pembayaran/' . $bukti_pembayaran);
                unlink('img/ppdb/bukti_pembayaran/thumb/' . 'thumb_' . $bukti_pembayaran);
            }
            $this->ppdb->delete($ppdb_id);
            $msg = [
                'sukses' => 'Peserta Berhasil Dihapus'
            ];

            echo json_encode($msg);
        }
    }

    public function hapusallppdb()
    {
        if ($this->request->isAJAX()) {
            $ppdb_id = $this->request->getVar('ppdb_id');
            $jmldata = count($ppdb_id);
            for ($i = 0; $i < $jmldata; $i++) {
                //check
                $cekdata = $this->ppdb->find($ppdb_id[$i]);
                $fotosiswa = $cekdata['foto_siswa'];
                $fotoijazah = $cekdata['foto_ijazah'];
                if ($fotosiswa != 'default.png') {
                    unlink('img/ppdb/' . $fotosiswa);
                    unlink('img/ppdb/thumb/' . 'thumb_' . $fotosiswa);
                }
                if ($fotoijazah != 'default.png') {
                    unlink('img/ppdb/ijazah/' . $fotoijazah);
                    unlink('img/ppdb/ijazah/thumb/' . 'thumb_' . $fotoijazah);
                }
                $this->ppdb->delete($ppdb_id[$i]);
            }

            $msg = [
                'sukses' => "$jmldata Data berhasil dihapus"
            ];
            echo json_encode($msg);
        }
    }

    //Gelombang
    public function gelombang()
    {
        $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
        $data = [
            'title' => 'File Pengumuman - ' . $konfigurasi['nama_web']
        ];
        return view('auth/gelombang/index', $data);
    }

    public function getdatagelombang()
    {
        if ($this->request->isAJAX()) {
            $konfigurasi = $this->konfigurasi->orderBy('konfigurasi_id')->first();
            $data = [
                'title' => 'File Pengumuman - ' . $konfigurasi['nama_web'],
                'list' => $this->gelombang->orderBy('id_file', 'DESC')->findAll()
            ];
            $msg = [
                'data' => view('auth/gelombang/list', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function formgelombang()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Tambah Gelombang',
            ];
            $msg = [
                'data' => view('auth/gelombang/tambah', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function simpangelombang()
    {
        if ($this->request->isAJAX()) {


            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'gelombang_id' => [
                    'label' => 'Gelombang',
                    'rules' => 'required|is_unique[file_pengumuman.gelombang_id]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh sama',
                    ]
                ],
                'file_pdf' => [
                    'label' => 'File',
                    'rules' => 'uploaded[file_pdf]|mime_in[file_pdf,application/pdf]',
                    'errors' => [
                        'mime_in' => 'Harus PDF!',
                    ]
                ]
            ]);
            $file_pdf = $this->request->getFile('file_pdf');
            if (!$valid) {
                $msg = [
                    'error' => [
                        'gelombang_id'  => $validation->getError('gelombang_id'),
                        'file_pdf'      => $validation->getError('file_pdf'),
                    ]
                ];
            } else {
                $simpandata = [
                    'gelombang_id'     => $this->request->getVar('gelombang_id'),
                    'file_pdf'         => $file_pdf->getName()
                ];

                $this->gelombang->insert($simpandata);
                $this->request->getFile('file_pdf')->move('file/gelombang');
                $msg = [
                    'sukses' => 'Data berhasil disimpan'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function formeditgelombang()
    {
        if ($this->request->isAJAX()) {

            $id_file = $this->request->getVar('id_file');
            $list =  $this->gelombang->find($id_file);
            $data = [
                'title'             => 'Detail Gelombang',
                'id_file'           => $list['id_file'],
                'gelombang_id'      => $list['gelombang_id'],
                'file'              => $list['file_pdf'],
            ];
            $msg = [
                'sukses' => view('auth/gelombang/edit', $data)
            ];
        }
        echo json_encode($msg);
    }

    public function updategelombang()
    {
        if ($this->request->isAJAX()) {

            $id_file = $this->request->getVar('id_file');
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'gelombang_id' => [
                    'label' => 'Gelombang',
                    'rules' => 'required|is_unique[file_pengumuman.gelombang_id,id_file,{id_file}]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh sama',
                    ]
                ],
                'file_pdf' => [
                    'label' => 'File',
                    'rules' => 'uploaded[file_pdf]|mime_in[file_pdf,application/pdf]',
                    'errors' => [
                        'mime_in' => 'Harus PDF!',
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'gelombang_id'  => $validation->getError('gelombang_id'),
                        'file_pdf'      => $validation->getError('file_pdf'),
                    ]
                ];

            } else {
                $cekdata = $this->gelombang->find($id_file);
                $old = $cekdata['file_pdf'];
                if ($old != 'default.pdf') {
                    unlink('file/gelombang/' . $old);
                }

                $file_pdf = $this->request->getFile('file_pdf');

                $updatedata = [
                    'gelombang_id' => $this->request->getVar('gelombang_id'),
                    'file_pdf'     => $file_pdf->getName()
                ];

                $this->gelombang->update($id_file, $updatedata);
                $this->request->getFile('file_pdf')->move('file/gelombang');
                $msg = [
                    'sukses' => 'Data berhasil diupdate'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function hapusgelombang()
    {
        if ($this->request->isAJAX()) {
            $id_file = $this->request->getVar('id_file');
            //check
            $cekdata = $this->gelombang->find($id_file);
            $file_gelombang = $cekdata['file_pdf'];
            if ($file_gelombang != 'default.pdf' || $file_gelombang == '') {
                unlink('file/gelombang/' . $file_gelombang);
            }

            $this->gelombang->delete($id_file);
            $msg = [
                'sukses' => 'Peserta Berhasil Dihapus'
            ];

            echo json_encode($msg);
        }
    }
}
