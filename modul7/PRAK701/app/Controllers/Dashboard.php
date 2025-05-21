<?php

namespace App\Controllers;

use App\Models\BookModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $bookModel = new BookModel();
        
        $data = [
            'title' => 'Dashboard',
            'totalBooks' => $bookModel->countAll(),
            'recentBooks' => $bookModel->orderBy('id', 'DESC')->findAll(5)
        ];
        
        return view('dashboard/index', $data);
    }
}