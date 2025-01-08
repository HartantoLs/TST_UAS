<?php

namespace App\Controllers;

use App\Models\QuestionModel;

class QuestionController extends BaseController
{
    protected $questionModel;

    public function __construct()
    {
        $this->questionModel = new QuestionModel();
    }

    /**
     * API untuk mendapatkan semua pertanyaan
     */
    public function getAllQuestions()
    {
        try {
            $questions = $this->questionModel->getAllQuestions();
            return $this->response->setJSON($questions);
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)->setJSON([
                'error' => $e->getMessage()
            ]);
        }
    }
}
