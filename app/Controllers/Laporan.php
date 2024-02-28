<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MLaporan;

class Laporan extends BaseController
{
    public function __construct()
    {
        $this->MLaporan = new MLaporan();
    }

    public function PrintDataProduk()
    {
        $data = [
            'judul' => 'Laporan Data Produk',
            'produk' => $this->MProduk->AllData(),
            'produk' => $this->M->DetailData(),
        ];
        return view('laporan/template_print_laporan', $data);
    }

   /* public function TambahData()
    {
        if ($this->validate([
            'nama_pelanggan' => [
                'label' => 'Nama Pelanggan',
                'rules' => ['required', 'alpha_space'],
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                    'alpha_space' => '{field} Hanya Dapat Diisi Dengan Alphabet dan Spasi'
                ]
            ],
            'nomor_telpon' => [
                'label' => 'Nomor Telpon',
                'rules' => 'is_unique[pelanggan.nomor_telpon]',
                'errors' => [
                    'is_unique' => '{field} Sudah ada, Masukan Nomor Telpon yang lain !!',
                ]
            ]
        ])) {
            $data = [
                'kode_pelanggan' => $this->request->getPost('kode_pelanggan'),
                'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
                'alamat' => $this->request->getPost('alamat'),
                'nomor_telpon' => $this->request->getPost('nomor_telpon'),
            ];
            $this->MPelanggan->TambahData($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
            return redirect()->to('pelanggan');
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('pelanggan'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function EditData($id_pelanggan)
    {
            $data = [
                'id_pelanggan' => $id_pelanggan,
                'kode_pelanggan' => $this->request->getPost('kode_pelanggan'),
                'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
                'alamat' => $this->request->getPost('alamat'),
                'nomor_telpon' => $this->request->getPost('nomor_telpon'),
            ];
            $this->MPelanggan->EditData($data);
            session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
            return redirect()->to('pelanggan');
        
        
    }
    

    public function HapusData($id_pelanggan)
    {
        $data = [
            'id_pelanggan' => $id_pelanggan,
        ];

        $this->MPelanggan->HapusData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('pelanggan'));
    }

    public function getKode() {
        $kode = $this->MPelanggan->getKode();
        return $this->response->setJSON(['kode' => $kode]);
    }*/
}
