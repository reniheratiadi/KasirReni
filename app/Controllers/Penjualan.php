<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MPenjualan;

class Penjualan extends BaseController
{
    public function __construct()
    {
        $this->MPenjualan = new MPenjualan();
    }

    public function index()
    {
        $cart = \Config\Services::cart();
        $data = [
            'judul' => 'Penjualan',
            'cart' => $cart->contents(),
            'subtotal' => $cart->total(),
            'produk' => $this->MPenjualan->AllProduk(),

        ];
        return view('penjualan', $data);
    }

    public function CekProduk()
    {
        $kode_produk = $this->request->getPost('kode_produk');
        $produk = $this->MPenjualan->CekProduk($kode_produk);
        if ($produk == null) {
            $data = [
                'nama_produk' => '',
                'harga_jual' => '',
            ];
        } else {
            $data = [
                'nama_produk' => $produk['nama_produk'],
                'harga_jual' =>  $produk['harga_jual'],
            ];
        }
        echo json_encode($data);
    }

    public function InsertCart()
    {
        $cart = \Config\Services::cart();
        $cart->insert(array(
            'id'      => $this->request->getPost('kode_produk'),
            'qty'  => $this->request->getPost('jumlah_produk'),
            'price'   => $this->request->getPost('harga_jual'),
            'name'    => $this->request->getPost('nama_produk'),
            // 'options' => array('Size' => 'L', 'Color' => 'Red')
        ));
        return redirect()->to(base_url('Penjualan'));
    }
    public function ViewCart()
    {
        $cart = \Config\Services::cart();
        $data = $cart->contents();

        echo dd($data);
    }

    public function ResetCart()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect()->to(base_url('Penjualan'));
    }
}
