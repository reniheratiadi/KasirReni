<?php

namespace App\Models;

use CodeIgniter\Model;

class MPenjualan extends Model
{
  public function CekProduk($kode_produk)
  {
    return $this->db->table('tbl_produk')
    ->where('kode_produk',$kode_produk)
    ->get()
    ->getRowArray();
  }

  public function AllProduk()
  {
      return $this->db->table('tbl_produk')
      //->where('stok_produk' > 0)
      ->get()
      ->getResultArray();
  }
}