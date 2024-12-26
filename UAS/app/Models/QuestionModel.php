<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{
    protected $table = 'questions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['question_text', 'created_at', 'updated_at'];

    /**
     * Mendapatkan soal berdasarkan nomor urutan dan opsi terkaitnya
     *
     * @param int $questionNumber
     * @return array|null
     */
    public function getQuestionWithOptions($questionNumber)
    {
        $questions = $this->orderBy('id', 'ASC')->findAll();

        // Pastikan nomor soal valid
        if (!isset($questions[$questionNumber - 1])) {
            return null;
        }

        $question = $questions[$questionNumber - 1];

        // Formatkan data agar mencakup detail opsi (jika diperlukan)
        return [
            'id' => $question['id'],
            'question_text' => $question['question_text']
        ];
    }
}
