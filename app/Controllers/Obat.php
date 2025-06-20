<?php

namespace App\Controllers;

use Config\Services;
use CodeIgniter\RESTful\ResourceController;

class Obat extends ResourceController {
    protected $modelName = 'App\\Models\\ObatModel';
    protected $format    = 'json';

    public function index(){
        $obat = $this->model->findAll();
        return $this->response->setJSON($obat);
    }

    public function create(){
        $validation = Services::validation();
        $validation->setRules([
            'nama_obat' => 'required',
            'kategori' => 'required',
            'stok' => 'required',
            'harga' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $validation->getErrors()])->setStatusCode(422);
        }

        $this->model->insert([
            'nama_obat'          => $this->request->getVar('nama_obat'),
            'kategori'        => $this->request->getVar('kategori'),
            'stok' => $this->request->getVar('stok'),
            'harga' => $this->request->getVar('harga'),
        ]);

        return $this->response->setJSON(['status' => 'obat berhasil ditambah']);
    }

    public function show($id = null){
        $obat = $this->model->find($id);
        if (!$obat) {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Data tidak ditemukan']);
        }
        return $this->response->setJSON($obat);
    }

    public function update($id = null){
        $validation = Services::validation();
        $validation->setRules([
            'nama_obat' => 'required',
            'kategori' => 'required',
            'stok' => 'required',
            'harga' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $validation->getErrors()])->setStatusCode(422);
        }

        $this->model->update($id, [
            'nama_obat'          => $this->request->getVar('nama_obat'),
            'kategori'        => $this->request->getVar('kategori'),
            'stok' => $this->request->getVar('stok'),
            'harga' => $this->request->getVar('harga'),
        ]);

        return $this->response->setJSON(['status' => 'obat berhasil di edit']);
    }

    public function delete($id = null){
        $this->model->delete($id);
        return $this->response->setJSON(['status' => 'obat berhasil di hapus']);
    }
}
