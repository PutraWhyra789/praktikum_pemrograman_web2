<?php

namespace App\Controllers;

use App\Models\StudentModel;

class Profile extends BaseController
{
    public function index()
    {
        $studentModel = new StudentModel();
        $data['student'] = $studentModel->getStudent();
        
        return view('templates/header', $data)
            . view('profil')
            . view('templates/footer');
    }
}