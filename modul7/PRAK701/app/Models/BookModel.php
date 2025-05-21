<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul', 'penulis', 'penerbit', 'tahun_terbit'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    protected $validationRules = [
        'judul' => 'required|min_length[3]',
        'penulis' => 'required',
        'penerbit' => 'required',
        'tahun_terbit' => 'required|numeric|exact_length[4]'
    ];
    
    protected $validationMessages = [
        'judul' => [
            'required' => 'Judul buku harus diisi',
            'min_length' => 'Judul buku minimal 3 karakter'
        ],
        'penulis' => [
            'required' => 'Penulis buku harus diisi'
        ],
        'penerbit' => [
            'required' => 'Penerbit buku harus diisi'
        ],
        'tahun_terbit' => [
            'required' => 'Tahun terbit buku harus diisi',
            'numeric' => 'Tahun terbit harus berupa angka',
            'exact_length' => 'Tahun terbit harus 4 digit'
        ]
    ];
}