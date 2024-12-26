<?php

namespace App\Models;

use CodeIgniter\Model;

class TestAnswerModel extends Model
{
    protected $table = 'test_answers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['test_id', 'question_id', 'selected_option_id', 'is_correct', 'created_at', 'updated_at'];

    /**
     * Mendapatkan daftar question_id yang sudah dijawab
     *
     * @param int $testId
     * @return array
     */
    public function getAnsweredQuestions($testId)
    {
        $answers = $this->where('test_id', $testId)->findAll();
        $answeredQuestions = [];
        foreach ($answers as $answer) {
            $answeredQuestions[] = $answer['question_id'];
        }
        return $answeredQuestions;
    }

    /**
     * Mendapatkan semua jawaban berdasarkan test_id
     *
     * @param int $testId
     * @return array
     */
    public function getAnswersByTestId($testId)
    {
        return $this->where('test_id', $testId)->findAll();
    }
}
