<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumModel extends Model
{
    protected $table = 'forumquestion'; // Tabel untuk pertanyaan forum
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'question', 'created_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Mengambil daftar pertanyaan dan nama pengguna yang mengajukan
    public function getForumQuestions()
    {
        return $this->select('forumquestion.*, users.username as user_name')
                    ->join('users', 'users.id = forumquestion.user_id')
                    ->findAll();
    }

    // Menyimpan pertanyaan baru ke dalam database
    public function saveQuestion($data)
    {
        return $this->insert($data);
    }

    // Mengambil jawaban berdasarkan id pertanyaan
    public function getAnswers($questionId)
    {
        $answerModel = new \App\Models\ForumAnswerModel();
        return $answerModel->where('question_id', $questionId)->findAll();
    }
}
