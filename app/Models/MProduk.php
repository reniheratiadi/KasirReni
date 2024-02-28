<?php

namespace App\Models;

use CodeIgniter\Model;

class MProduk extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_produk')
            ->get()
            ->getResultArray();
    }

    public function TambahData($data)
    {
        $this->db->table('tbl_produk')->insert($data);
    }


    public function EditData($data)
    {
        $this->db->table('tbl_produk')
            ->where('id_produk =' . $data['id_produk'])
            ->update($data);
    }

    public function HapusData($data)
    {
        $this->db->table('tbl_produk')
            ->where('id_produk =' . $data['id_produk'])
            ->delete($data);
    }

    /* public function CreateCode()
    {
        $this->db->select('RIGHT(tbl_produk.kode_produk,5) as kode_produk', FALSE);
        $this->db->order_by('kode_produk','DECS');
        $this->db->limit(1);
        $query = $this->db->get('tbl_produk');
            if($query->num_rows() <> 0){
                $data = $query->row();
                $kode = inval($data->kode_produk) + 1;
            } 
            else{
                $kode = 1;
            }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "BR".$batas;
        return $kodetampil;
}

public function getProdukByKode($kode_produk) {
    return $this->db->table('tbl_produk')
        ->where('kode_produk', $kode_produk)
        ->get()
        ->getResultArray();
}
*/
    public function getKode()
    {
        $kode = $this->db->table('tbl_produk')
            ->select('kode_produk')
            ->orderBy('kode_produk', 'DESC')
            ->get()
            ->getRow();

        if (isset($kode)) {
            $kode = $kode->kode_produk;
            preg_match('/(\d+)$/', $kode, $matches);
            $number = intval($matches[0]);
            $number++;

            return 'PRD' . str_pad($number, strlen($matches[0]), '0', STR_PAD_LEFT);
        } else {
            return 'PRD';
        }
    }
}
