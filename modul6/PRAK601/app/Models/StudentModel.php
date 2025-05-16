<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    public function getStudent()
    {
        return [
            'nama' => 'Putra Whyra Pratama S.',
            'nim' => '2310817210029',
            'prodi' => 'Teknologi Informasi',
            'hobi' => ['Bermain catur', 'Scroll Fesnuk', 'Bermain Game', 'Mendengarkan Musik'],
            'skills' => ['Python', 'Linux', 'R', 'OSINT'],
            'foto' => 'assets/foto.jpg',
            'info_tambahan' => 'Saya orangnya suka mendengarkan musik, main game, dan suka waifu rambut putih. Waifu pertama Nao Tomori dari anime charlotte.'
        ];
    }
}