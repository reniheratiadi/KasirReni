<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MUser;

class User extends BaseController
{
    public function __construct()
    {
        $this->MUser = new MUser();
    }
    public function index()
    {
        $data = [
            'judul' => 'User',
            'subjudul' => 'User',
            'menu' => 'masterdata',
            'submenu' => 'user',
            'page' => 'user',
            'user' => $this ->MUser->AllData(),
        ];
        return view('template', $data);
    }
    public function TambahData()
    {
        if ($this->validate([
            'kode_user' => [
                'label' => 'Kode User',
                'rules' => 'is_unique[tbl_user.kode_user]',
                'errors' => [
                    'is_unique' => '{field} Sudah Ada, Masukan Kode Yang Lain !!',
                    
                    ]
                ],
             'email' => [
                'label' => 'Email',
                'rules' => 'is_unique[tbl_user.email]',
                'errors' => [
                    'is_unique' => '{field} Sudah Ada, Masukan Email Yang Lain !!',
                    
                    ]
                ]
                
        ])) {

        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'))->withInput('validation', \Config\Services::validataion());
          }
        $data = [
            'kode_user' => $this->request->getPost('kode_user'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => sha1($this->request->getPost('password')),
            'level' => $this->request->getPost('level'),
           
        ];
    
        $this->MUser->TambahData($data);
        session()->setFlashdata('pesan','Data Berhasil Ditambahkan !!');
        return redirect()->to('user');
    }

    public function EditData($id_user)
    {
        $data = [
            'id_user' => $id_user,
            'kode_user' => $this->request->getPost('kode_user'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => sha1($this->request->getPost('password')),
            'level' => $this->request->getPost('level'),
           
            
        ];

    
        $this->MUser->EditData($data);
        session()->setFlashdata('pesan','Data Berhasil DiUpdate !!');
        return redirect()->to('user');
    }

    public function HapusData($id_user)
    {
        $data = [
            'id_user' => $id_user,
            
        ];

        $this->MUser->HapusData($data);
        session()->setFlashdata('pesan','Data Berhasil Dihapus !!');
        return redirect()->to('user');
    }

    public function getKode() {
        $kode = $this->MUser->getKode();
        return $this->response->setJSON(['kode_user' => $kode]);
    }

 }
