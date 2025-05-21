<?php

namespace App\Controllers;

use App\Models\BookModel;

class Book extends BaseController
{
    protected $bookModel;
    
    public function __construct()
    {
        $this->bookModel = new BookModel();
    }
    
    public function index()
    {
        $data = [
            'title' => 'Daftar Buku',
            'books' => $this->bookModel->findAll()
        ];
        
        return view('books/index', $data);
    }
    
    public function new()
    {
        $data = [
            'title' => 'Tambah Buku Baru'
        ];
        
        return view('books/create', $data);
    }
    
    public function create()
    {
        $rules = [
            'judul' => 'required|min_length[3]',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric|exact_length[4]'
        ];
        
        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Gagal menambahkan buku. Periksa kembali data yang dimasukkan.');
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }
        
        $this->bookModel->save([
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit')
        ]);
        
        session()->setFlashdata('success', 'Buku berhasil ditambahkan!');
        
        return redirect()->to('/books');
    }
    
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Buku',
            'book' => $this->bookModel->find($id)
        ];
        
        if (empty($data['book'])) {
            session()->setFlashdata('error', 'Buku tidak ditemukan!');
            return redirect()->to('/books');
        }
        
        return view('books/edit', $data);
    }
    
    public function update($id)
    {
        $rules = [
            'judul' => 'required|min_length[3]',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric|exact_length[4]'
        ];
        
        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Gagal mengupdate buku. Periksa kembali data yang dimasukkan.');
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }
        
        $this->bookModel->update($id, [
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit')
        ]);
        
        session()->setFlashdata('success', 'Buku berhasil diupdate!');
        
        return redirect()->to('/books');
    }
    
    public function delete($id)
    {
        $book = $this->bookModel->find($id);
        
        if (empty($book)) {
            session()->setFlashdata('error', 'Buku tidak ditemukan!');
            return redirect()->to('/books');
        }
        
        $this->bookModel->delete($id);
        
        session()->setFlashdata('success', 'Buku berhasil dihapus!');
        
        return redirect()->to('/books');
    }
}