<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumQuestionModel extends Model
{
    protected $table = 'forumquestion';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'question', 'created_at', 'updated_at'];

    public function findAllWithAnswers()
    {
        return $this->select('forumquestion.*, forumanswer.answer, forumanswer.user_id as answer_user_id')
                    ->join('forumanswer', 'forumanswer.question_id = forumquestion.id', 'left')
                    ->orderBy('forumquestion.created_at', 'DESC')
                    ->findAll();
    }
}
