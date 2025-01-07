<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ForumModel;
use App\Models\ForumAnswerModel;

class ForumController extends Controller
{
    // Menampilkan semua pertanyaan beserta jawabannya
    public function index()
    {
        // Mengambil session
        $session = session();
        $user = $session->get('user'); // Mendapatkan data user yang ada di session

        // Cek jika tidak ada user di session, arahkan ke login
        if (!$user || !isset($user->id)) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Menampilkan semua pertanyaan dan jawabannya
        $forumModel = new ForumModel();
        $data['questions'] = $forumModel->getForumQuestions();
        $data['forumModel'] = $forumModel; // Menambahkan model untuk digunakan di view

        return view('forum', $data); // Menampilkan view forum.php
    }

    // Menambahkan pertanyaan baru
    public function addQuestion()
    {
        // Mengambil session
        $session = session();
        $user = $session->get('user'); // Mendapatkan data user yang ada di session

        // Cek jika tidak ada user di session, arahkan ke login
        if (!$user || !isset($user->id)) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Mendapatkan data pertanyaan
        $question = $this->request->getPost('question');
        $userId = $user->id; // Mengakses id dengan tanda "->" karena $user adalah objek

        // Jika pertanyaan ada, simpan ke dalam database
        if ($question) {
            $forumModel = new ForumModel();
            $forumModel->saveQuestion([
                'user_id' => $userId,
                'question' => $question,
            ]);

            return redirect()->to('/forum');
        } else {
            return redirect()->back()->with('error', 'Pertanyaan tidak boleh kosong.');
        }
    }

    // Menambahkan jawaban pada pertanyaan
    public function addAnswer($questionId)
    {
        // Mengambil session
        $session = session();
        $user = $session->get('user'); // Mendapatkan data user yang ada di session

        // Cek jika tidak ada user di session, arahkan ke login
        if (!$user || !isset($user->id)) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Mendapatkan data jawaban
        $answer = $this->request->getPost('answer');
        $userId = $user->id; // Mengakses id dengan tanda "->" karena $user adalah objek

        // Jika jawaban ada, simpan ke dalam database
        if ($answer) {
            $forumAnswerModel = new ForumAnswerModel(); // Menggunakan ForumAnswerModel
            $forumAnswerModel->saveAnswer([ // Memanggil metode saveAnswer
                'question_id' => $questionId,
                'user_id' => $userId,
                'answer' => $answer,
            ]);

            return redirect()->to('/forum');
        } else {
            return redirect()->back()->with('error', 'Jawaban tidak boleh kosong.');
        }
    }
}
