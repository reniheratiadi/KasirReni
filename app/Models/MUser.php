<?php

namespace App\Models;

use CodeIgniter\Model;

class MUser extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_user')->get()->getResultArray();
    }

    public function TambahData($data)
    {
        $this->db->table('tbl_user')->insert($data);
    }

    public function EditData($data)
    {
        $this->db->table('tbl_user')
            ->where('id_user', $data['id_user'])
            ->update($data);
    }

    public function HapusData($data)
    {
        $this->db->table('tbl_user')
            ->where('id_user', $data['id_user'])
            ->delete($data);
    }

    public Function getKode() {
        $kode = $this->db->table('tbl_user')
        ->select('kode_user')
        ->orderBy('kode_user', 'DESC')
        ->get()
        ->getRow();
    
        if(isset($kode)) {
            $kode = $kode->kode_user;
            preg_match('/(\d+)$/', $kode, $matches);
            $number = intval($matches[0]);
            $number++;
            
            return 'USR' . str_pad($number, strlen($matches[0]), '0', STR_PAD_LEFT);
        }else {
            return 'USR';
        }
    }

    public function LoginUser($email, $password)
    {
        return $this->db->table('tbl_user')
            ->where([
                'email' => $email,
                'password' => $password,
            ])->get()->getRowArray();
    }
    /*public function CreateCode()
    {
        $this->db->select('RIGHT(tbl_user.id_user,5)as id_user', FALSE);
        $this->db->order_by('id_user', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_user');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $id = intal($data->id_user) + 1;
        } else {
            $id = 1;
        }
        $batas = str_pad($id, 5, "0", STR_PAD_LEFT);
        $kodetampil = "USR" . $batas;
        return $kodetampil;
    }*/
    public function getUserByID($id_user)
    {
        return $this->db->table('tbl_user')
            ->where([
                'id_user' => $id_user,
            ])->get()->getRowArray();
    }
}
