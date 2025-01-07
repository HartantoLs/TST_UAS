<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumAnswerModel extends Model
{
    protected $table = 'forumanswer';
    protected $primaryKey = 'id';
    protected $allowedFields = ['question_id', 'user_id', 'answer', 'created_at', 'updated_at'];
}
