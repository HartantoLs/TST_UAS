<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumAnswerModel extends Model
{
    protected $table = 'forumanswer'; // Ganti dengan nama tabel yang sesuai
    protected $primaryKey = 'id'; // Primary key tabel
    protected $allowedFields = ['question_id', 'user_id', 'answer']; // Kolom yang boleh diinsert atau diupdate
    protected $useTimestamps = true; // Menggunakan kolom created_at dan updated_at secara otomatis

    // Method untuk menyimpan jawaban
    public function saveAnswer($data)
    {
        return $this->insert($data); // Menyimpan jawaban ke dalam tabel forumanswer
    }

    // Mendapatkan jawaban berdasarkan question_id
    public function getAnswers($questionId)
    {
        return $this->where('question_id', $questionId)->findAll();
    }
}
