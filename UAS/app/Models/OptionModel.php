<?php

namespace App\Models;

use CodeIgniter\Model;

class OptionModel extends Model
{
    protected $table = 'options';
    protected $primaryKey = 'id';
    protected $allowedFields = ['question_id', 'option_text', 'is_correct', 'created_at', 'updated_at'];

    // Fungsi untuk mendapatkan opsi berdasarkan question_id
    public function getOptionsByQuestionId($questionId)
    {
        return $this->where('question_id', $questionId)->findAll();
    }
}
