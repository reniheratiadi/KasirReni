<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MProduk;
use \Dompdf\Dompdf;

class Produk extends BaseController
{
    public function __construct()
    {
        $this->MProduk = new MProduk();
    }

    public function index()
    {

        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Produk',
            'menu' => 'masterdata',
            'submenu' => 'produk',
            'page' => 'produk',
            'produk' => $this->MProduk->AllData(),
        ];
        return view('template', $data);
    }

    public function TambahData()
    {
        if ($this->validate([
            'kode_produk' => [
                'label' => 'Kode Produk',
                'rules' => 'is_unique[tbl_produk.kode_produk]',
                'errors' => [
                    'is_unique' => '{field} Sudah Ada, Masukan Kode Yang Lain !!',
                ]
            ],
            'nama_produk' => [
                'label' => 'Nama Produk',
                'rules' => 'is_unique[tbl_produk.nama_produk]',
                'errors' => [
                    'is_unique' => '{field} Sudah Ada, Masukan Produk Yang Lain !! !',
                ]
            ]

        ])) {
            $hargabeli = str_replace(",", "", $this->request->getPost('harga_beli'));
            $hargajual = str_replace(",", "", $this->request->getPost('harga_jual'));
            $data = [
                'kode_produk' => $this->request->getPost('kode_produk'),
                'nama_produk' => $this->request->getPost('nama_produk'),
                'harga_beli' => $hargabeli,
                'harga_jual' => $hargajual,
                'stok' => $this->request->getPost('stok'),

            ];
            $this->MProduk->TambahData($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
            return redirect()->to('produk');
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('produk'))->withInput('validation', \Config\Services::validataion());
        }
    }

    public function EditData($id_produk)
    {

        $data = [
            'id_produk' => $id_produk,
            'kode_produk' => $this->request->getPost('kode_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual' => $this->request->getPost('harga_jual'),
            'stok' => $this->request->getPost('stok'),
        ];


        $this->MProduk->EditData($data);
        session()->setFlashdata('pesan', 'Data Berhasil DiUbah !!');
        return redirect()->to('produk');
    }


    public function HapusData($id_produk)
    {
        $data = [
            'id_produk' => $id_produk,

        ];


        $this->MProduk->HapusData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus !!');
        return redirect()->to('produk');
    }

    public function getKode()
    {
        $kode = $this->MProduk->getKode();
        return $this->response->setJSON(['kode' => $kode]);
    }

    public function printpdf()
    {
        $data = [
            'kode_produk' => $this->request->getPost('kode_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual' => $this->request->getPost('harga_jual'),
            'stok' => $this->request->getPost('stok'),
        ];
        $dompdf = new Dompdf();
        $html = view('produk', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
        $dompdf->stream('data produk.pdf', array(
            "Attachment" => false
        ));
    }
}
