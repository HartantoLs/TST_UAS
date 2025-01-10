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
            log_message('debug', 'Questions Retrieved: ' . json_encode($questions));
            return $this->response->setJSON($questions);
        } catch (\Exception $e) {
            log_message('error', 'Error in getAllQuestions: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'error' => $e->getMessage()
            ]);
        }
    }

}
