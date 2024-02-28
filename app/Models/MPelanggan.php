<?php

namespace App\Models;

use CodeIgniter\Model;

class MPelanggan extends Model
{
    public function AllData()
    {
        return $this->db->table('pelanggan')
        ->get()
        ->getResultArray();
    }

    public function TambahData($data)
    {
        $this->db->table('pelanggan')->insert($data);
    }

    public function EditData($data)
    {
        $this->db->table('pelanggan')
        ->where('id_pelanggan ='. $data['id_pelanggan'])
        ->update($data);
    }

    public function HapusData($data)
    {
        $this->db->table('pelanggan')
        ->where('id_pelanggan ='. $data['id_pelanggan'])
        ->delete($data);
    }

    public Function getKode() {
        $kode = $this->db->table('pelanggan')
        ->select('kode_pelanggan')
        ->orderBy('kode_pelanggan', 'DESC')
        ->get()
        ->getRow();

        if(isset($kode)) {
            $kode = $kode->kode_pelanggan;
            preg_match('/(\d+)$/', $kode, $matches);
            $number = intval($matches[0]);
            $number++;
            
            return 'PLGN' . str_pad($number, strlen($matches[0]), '0', STR_PAD_LEFT);
        }else {
            return 'PLGN';
        }
    }
}