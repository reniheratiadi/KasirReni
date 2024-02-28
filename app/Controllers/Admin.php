<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'subjudul' => '',
            'menu' => 'dashboard',
            'submenu' => '',
            'page' => 'admin',
        ];
        return view('template', $data);
    }

    public function Penjualan()
    {
        $data = [
            'judul' => 'Penjualan',
            'subjudul' => '',
            'menu' => 'penjualan',
            'submenu' => '',
            'page' => 'penjualan',
        ];
        return view('template', $data);
    }

    public function Setting()
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => '',
            'menu' => 'setting',
            'submenu' => '',
            'page' => 'setting',
        ];
        return view('template', $data);
    }
}
