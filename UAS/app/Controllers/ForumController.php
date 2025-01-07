<?php

namespace App\Controllers;

use App\Models\ForumQuestionModel;
use App\Models\ForumAnswerModel;
use App\Models\UserModel; // Pastikan model User sudah ada
use CodeIgniter\Controller;

class ForumController extends Controller
{
    protected $questionModel;
    protected $answerModel;
    protected $userModel;

    public function __construct()
    {
        $this->questionModel = new ForumQuestionModel();
        $this->answerModel = new ForumAnswerModel();
        $this->userModel = new UserModel(); // Tambahkan model User
    }

    public function index()
    {
        $session = session();
        $user = $session->get('user'); // Ambil data user dari session

        if (!$user) {
            return redirect()->to('/login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        // Ambil semua pertanyaan beserta username dan jawaban terkait
        $questions = $this->questionModel
            ->select('forumquestion.*, users.username AS question_username')
            ->join('users', 'users.id = forumquestion.user_id')
            ->orderBy('forumquestion.created_at', 'DESC')
            ->findAll();

        foreach ($questions as &$question) {
            $question['answers'] = $this->answerModel
                ->select('forumanswer.*, users.username AS answer_username')
                ->join('users', 'users.id = forumanswer.user_id')
                ->where('forumanswer.question_id', $question['id'])
                ->findAll();
        }

        return view('forum', [
            'username' => $user->username,
            'user_id' => $user->user_id,
            'questions' => $questions,
        ]);
    }

    public function addQuestion()
    {
        $session = session();
        $user = $session->get('user');

        if (!$user) {
            return redirect()->to('/login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $question = $this->request->getPost('question');

        if (!$question) {
            return redirect()->back()->with('error', 'Pertanyaan tidak boleh kosong.');
        }

        $this->questionModel->insert([
            'user_id' => $user->user_id,
            'question' => $question,
        ]);

        return redirect()->to('/forum')->with('success', 'Pertanyaan berhasil ditambahkan.');
    }

    public function addAnswer($questionId)
    {
        $session = session();
        $user = $session->get('user');

        if (!$user) {
            return redirect()->to('/login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $answer = $this->request->getPost('answer');

        if (!$answer) {
            return redirect()->back()->with('error', 'Jawaban tidak boleh kosong.');
        }

        $this->answerModel->insert([
            'question_id' => $questionId,
            'user_id' => $user->user_id,
            'answer' => $answer,
        ]);

        // Ambil jawaban terbaru untuk dikirimkan ke view
        $newAnswer = $this->answerModel
            ->select('forumanswer.*, users.username AS answer_username')
            ->join('users', 'users.id = forumanswer.user_id')
            ->where('forumanswer.question_id', $questionId)
            ->orderBy('forumanswer.created_at', 'DESC')
            ->first();

        return redirect()->to('/forum')->with('success', 'Jawaban berhasil ditambahkan.');
    }
}
