<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumAnswerModel extends Model
{
    protected $table = 'forumanswer';
    protected $primaryKey = 'id';
    protected $allowedFields = ['question_id', 'user_id', 'answer', 'created_at', 'updated_at'];

    /**
     * Menghapus jawaban berdasarkan ID dan user_id
     *
     * @param int $id
     * @param int $userId
     * @return bool
     */
    public function deleteAnswerById($id, $userId)
    {
        return (bool) $this->where('id', $id)
            ->where('user_id', $userId)
            ->delete();
    }

    /**
     * Mendapatkan jawaban terkait dengan pertanyaan
     *
     * @param int $questionId
     * @return array
     */
    public function findAnswersByQuestionId($questionId)    
    {
        return $this->db->table($this->table)
            ->select('forumanswer.*, users.username AS answer_username')
            ->join('users', 'users.id = forumanswer.user_id', 'left')
            ->where('forumanswer.question_id', $questionId)
            ->orderBy('forumanswer.created_at', 'ASC')
            ->get()
            ->getResultArray();
    }
}
