<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumQuestionModel extends Model
{
    protected $table = 'forumquestion';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'question', 'created_at', 'updated_at'];

    /**
     * Mengambil semua pertanyaan dengan jawaban terkait
     *
     * @return array
     */
    public function findAllWithAnswers()
    {
        return $this->db->table($this->table)
            ->select('forumquestion.*, forumanswer.answer, forumanswer.user_id AS answer_user_id, users.username AS question_username')
            ->join('forumanswer', 'forumanswer.question_id = forumquestion.id', 'left')
            ->join('users', 'users.id = forumquestion.user_id', 'left')
            ->orderBy('forumquestion.created_at', 'DESC')
            ->get()
            ->getResultArray();
    }

    /**
     * Menghapus pertanyaan berdasarkan ID dan user_id
     *
     * @param int $id
     * @param int $userId
     * @return bool
     */
    public function deleteQuestionById($id, $userId)
    {
        return (bool) $this->where('id', $id)
            ->where('user_id', $userId)
            ->delete();
    }
}
