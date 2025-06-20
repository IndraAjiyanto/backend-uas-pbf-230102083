<?php namespace App\Controllers;

use Config\Services;
use CodeIgniter\RESTful\ResourceController;

class Pasien extends ResourceController {
    protected $modelName = 'App\\Models\\PasienModel';
    protected $format    = 'json';

    public function index(){
        $pasien = $this->model->findAll();
        return $this->response->setJSON($pasien);
    }

    public function create(){
        $validation = Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $validation->getErrors()])->setStatusCode(422);
        }

        $this->model->insert([
            'nama'          => $this->request->getVar('nama'),
            'alamat'        => $this->request->getVar('alamat'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
        ]);

        return $this->response->setJSON(['status' => 'pasien berhasil ditambah']);
    }

    public function show($id = null){
        $pasien = $this->model->find($id);
        if (!$pasien) {
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Data tidak ditemukan']);
        }
        return $this->response->setJSON($pasien);
    }

    public function update($id = null){
        $validation = Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $validation->getErrors()])->setStatusCode(422);
        }

        $this->model->update($id, [
            'nama'          => $this->request->getVar('nama'),
            'alamat'        => $this->request->getVar('alamat'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
        ]);

        return $this->response->setJSON(['status' => 'pasien berhasil di edit']);
    }

    public function delete($id = null){
        $this->model->delete($id);
        return $this->response->setJSON(['status' => 'pasien berhasil di hapus']);
    }
}